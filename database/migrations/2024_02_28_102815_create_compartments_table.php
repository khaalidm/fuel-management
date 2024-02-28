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
        Schema::create('compartments', function (Blueprint $table) {
            $table->id();
            $table->enum('fuel' ,['ulp_93', 'ulp_95', 'diesel', 'empty'])->default('empty');
            $table->enum('status', ['empty', 'loading', 'loaded', 'unloading', 'unloaded'])->default('empty');
            $table->foreignId('truck_id')->constrained();
            $table->integer('capacity')->default(0);
            $table->integer('level')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compartments');
    }
};
