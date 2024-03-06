<?php

namespace App\Http\Controllers\Api\Sensors;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Sensors\SensorsService;

class LogsController extends Controller
{
    function __construct(
        private SensorsService $service
    ) { }

    public function index(string $param, Request $request)
    {
        $logs = $this->service
            ->setParam($param)
            ->getLogs($request->query());

        return response()->json([
            'data' => $logs
        ]);
    }

    public function deleteAll(string $param)
    {
        $this->service
            ->setParam($param)
            ->deleteLogs();

        return response()->json([]);
    }
}
