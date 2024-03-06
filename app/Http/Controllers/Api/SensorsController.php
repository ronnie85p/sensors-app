<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Sensors\SensorsService;
use Illuminate\Http\Request;


class SensorsController extends Controller
{
    function __construct(
        private SensorsService $service
    ) { }

    public function getValue(string $param, Request $request)
    {
        $this->service->setParam($param);
        $value = $this->service->getValue();

        return response()->json([
            'data' => $value,
        ]);
    }
}
