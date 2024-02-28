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
        Schema::create('retailers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->integer('ulp_93')->default(0);
            $table->integer('ulp_95')->default(0);
            $table->integer('diesel')->default(0);
            $table->integer('ulp_93_tank')->default(0);
            $table->integer('ulp_95_tank')->default(0);
            $table->integer('diesel_tank')->default(0);
            $table->integer('ulp_93_demand_per_day')->default(0);
            $table->integer('ulp_95_demand_per_day')->default(0);
            $table->integer('diesel_demand_per_day')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retailers');
    }
};
