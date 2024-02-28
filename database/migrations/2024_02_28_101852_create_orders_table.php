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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('retailer_id')->nullable();
            $table->foreignId('truck_id')->nullable();
            $table->integer('ulp_93')->default(0);
            $table->integer('ulp_95')->default(0);
            $table->integer('diesel')->default(0);
            $table->json('compartments')->default(json_encode([]));
            $table->enum('status', ['pending', 'delivered', 'cancelled'])->default('pending');
            $table->dateTime('delivery_date')->default(now()->add('2', 'day'));
            $table->dateTime('delivered_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
