<?php

namespace App\Services\Sensors;

use GuzzleHttp\Client;
use App\Models\SensorsConfig as Config;
use App\Models\SensorsLog as Log;

class SensorsService
{
    private $param;
    private $config;

    public function __construct() { }

    public function setParam(string $param)
    {
        $this->param = strtoupper($param);

        return $this;
    }

    public function getParam()
    {
        return $this->param;
    }

    public function getConfig()
    {
        if (is_null($this->config)) {
            $this->config = Config::where("param", $this->param)->first();
        }

        return $this->config;
    }

    public function setConfig(array $config)
    {
        $saved = Config::updateOrCreate(['param' => $this->param], $config);
        if ($saved) {
            $this->config = null;
        }

        return $saved;
    }

    public function setLog(string $value)
    {
        $created = Log::create([
            'param' => $this->param, 
            'value' => $value
        ]);

        return $created;
    }

    public function getLogs(array $params)
    {
        $params = array_merge([
            'start' => 0,
            'end' => 25,
            'date_start' => null,
            'date_end' => null,
            'sortby' => 'created_at',
            'sortdir' => 'desc'
        ], $params);

        $builder = Log::where('param', $this->param)
            ->orderBy($params['sortby'], $params['sortdir'])
            ->skip($params['start'])
            ->take($params['end']);

        if (!empty($params['date_start'])) {
            $builder->where('created_at', '>=', $params['date_start']);

            if (!empty($params['date_end'])) {
                $builder->where('created_at','<=', $params['date_end']);
            }
        }

        return $builder->get();
    }

    public function deleteLogs()
    {
        return Log::where('param', $this->param)->delete();
    }

    public function isLocalDomain(string $url)
    {
        $url_parts = parse_url($url);

        return empty($url_parts['host']) || in_array($url_parts['host'], ['127.0.0.1', 'localhost']);
    }

    public function getDataFromLocalDomain(string $url)
    {
        $route = app('router')->getRoutes()->match(app('request')->create($url ,"GET"));

        return empty($route) ? null : $route->run();
    }

    public function getDataFromRemoteDomain(string $url)
    {
        $client = new Client(); 
        $response = $client->get($url, ['verify' => false]);

        return $response->getBody()->getContents(); 
    }

    public function getDataFromService()
    {
        $this->getConfig();

        if (empty($this->config['url']) || !is_string($this->config['url'])) {
            return null;
        }

        // $url = 'https://chart.googleapis.com/chart?cht=p3&chs=250x100&chd=t:60,40&chl=Hello|World&chof=json';

        $url = trim($this->config['url']);

        return $this->isLocalDomain($url) 
            ? $this->getDataFromLocalDomain($url) 
            : $this->getDataFromRemoteDomain($url);
    }

    public function getValue()
    {
        $data = $this->getDataFromService();
        if (!empty($data)) {
            $value = str_replace("{$this->param}=", '', $data);

            $this->setLog($value);
    
            return $value;
        }

        return null;
    }
}