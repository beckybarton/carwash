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
        Schema::create('job_orders', function (Blueprint $table) {
            $table->id();
            $table->string('customername')->nullable()->default(null);
            $table->unsignedBigInteger('vehicle_type_id');
            $table->string('plate_number')->nullable()->default(null);
            $table->datetime('time_in')->nullable()->default(null);
            $table->string('status')->nullable()->default('pending');
            $table->timestamps();

            $table->foreign('vehicle_type_id')
              ->references('id')
              ->on('vehicle_types')
              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_orders');
    }
};
