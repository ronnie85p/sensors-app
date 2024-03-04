<?php

namespace App\Http\Controllers\Api\Sensors;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Sensors\SensorsService;

class LogsController extends Controller
{
    private $service;

    function __construct()
    {
        $this->service = new SensorsService();
    }

    public function index(string $param, Request $request)
    {
        $this->service->setParam($param);
        $logs = $this->service->getLogs($request->query());

        return response()->json([
            'data' => $logs
        ]);
    }

    public function deleteAll(string $param)
    {
        $this->service->setParam($param);
        $this->service->deleteLogs();

        return response()->json([]);
    }
}
