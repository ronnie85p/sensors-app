<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Sensors\SensorsService;
use Illuminate\Http\Request;


class SensorsController extends Controller
{

    private $service;

    function __construct()
    {
        $this->service = new SensorsService();
    }

    public function getValue(string $param, Request $request)
    {
        $this->service->setParam($param);
        $value = $this->service->getValue();

        return response()->json([
            'data' => $value,
        ]);
    }
}
