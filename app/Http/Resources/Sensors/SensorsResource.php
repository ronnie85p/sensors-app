<?php

namespace App\Http\Resources\Sensors;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SensorsResource extends JsonResource
{
    function __construct(
        private $data = null
    ) {

    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->data
        ];
    }
}
