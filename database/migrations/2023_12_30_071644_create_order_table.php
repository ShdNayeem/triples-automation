<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id');
            $table->integer('user_id');
            $table->bigInteger('order_payment_id');
            $table->string('method');
            $table->string('currency');
            $table->string('user_email');
            $table->integer('amount');
            $table->string('status');
            $table->json('json_response');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
