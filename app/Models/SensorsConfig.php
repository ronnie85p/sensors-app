<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensorsConfig extends Model
{
    use HasFactory;

    protected $fillable = [
        "query_delay", "url", "param"
    ];
}
