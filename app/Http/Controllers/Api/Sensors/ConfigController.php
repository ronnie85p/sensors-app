<?php

namespace App\Http\Controllers\Api\Sensors;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Sensors\SensorsResource;
use App\Services\Sensors\SensorsService;

class ConfigController extends Controller
{
    function __construct(
        private SensorsService $service
    ) { }

    public function show(string $param)
    {
        $config = $this->service
            ->setParam($param)
            ->getConfig();

        return new SensorsResource($config);
    }

    public function store(string $param, Request $request)
    {
        $fields = $request->all();

        $this->service
            ->setParam($param)
            ->setConfig($fields);

        return new SensorsResource(
            $this->service->getConfig()
        );
    }
}
