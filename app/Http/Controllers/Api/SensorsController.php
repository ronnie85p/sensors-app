<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Sensors\SensorsResource;
use App\Services\Sensors\SensorsService;
use Illuminate\Http\Request;


class SensorsController extends Controller
{
    function __construct(
        private SensorsService $service
    ) { }

    public function getValue(string $param, Request $request)
    {
        $value = $this->service
            ->setParam($param)
            ->getValue();

        return  new SensorsResource($value);
    }
}
