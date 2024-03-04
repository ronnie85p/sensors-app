<?php

namespace App\Http\Controllers\Api\Sensors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Sensors\SensorsService;

class ConfigController extends Controller
{
    private $service;

    function __construct()
    {
        $this->service = new SensorsService();
    }

    public function show(string $param)
    {
        $this->service->setParam($param);
        $config = $this->service->getConfig();

        return response()->json([
            'data' => $config
        ]);
    }

    public function store(string $param, Request $request)
    {
        $fields = $request->all();

        $this->service->setParam($param);
        $this->service->setConfig($fields);

        return response()->json([
            'config' => $this->service->getConfig(),
        ]);
    }
}
