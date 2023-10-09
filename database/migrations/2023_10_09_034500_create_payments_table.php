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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->default(null);
            $table->foreign('customer_id')
              ->references('id')
              ->on('customers')
              ->onDelete('cascade');

            $table->unsignedBigInteger('receiver_id')->default(null);
            $table->foreign('receiver_id')
              ->references('id')
              ->on('users')
              ->onDelete('cascade');

            $table->float('amount')->nullable()->default(0);
            $table->string('receipt')->nullable()->default(null);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
