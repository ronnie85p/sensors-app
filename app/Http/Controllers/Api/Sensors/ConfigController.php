<?php

namespace App\Http\Controllers\Api\Sensors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

        return response()->json([
            'data' => $config
        ]);
    }

    public function store(string $param, Request $request)
    {
        $fields = $request->all();

        $this->service
            ->setParam($param)
            ->setConfig($fields);

        return response()->json([
            'config' => $this->service->getConfig(),
        ]);
    }
}
