<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sensors_configs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->char('param');
            $table->string("url");
            $table->tinyInteger("query_delay")->default(0);

            $table->index(['param', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sensors_configs');
    }
};
