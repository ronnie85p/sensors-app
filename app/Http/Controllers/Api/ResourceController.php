<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    private $sensors = [
        "T" => [
            32, 14, 20, 45, 11, 0, -29, 36
        ],

        "P" => [
            5, 1, 10, 3
        ],

        'V' => [
            2000, 3000, 4000
        ]
    ];

    public function getValue(string $param, Request $request) 
    {
        $param = strtoupper($param);
        $sensor = $this->sensors[$param] ?? [];

        if (empty($sensor)) {
            return null;
        }

        $value = $sensor[mt_rand(0, count($sensor)-1)];

        return "{$param}={$value}";
    }
}
