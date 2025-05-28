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
        Schema::create('customer_profile', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id');
            $table->bigInteger('mobile');
            $table->string('door_no');
            $table->string('street');
            $table->string('pincode');
            $table->string('area');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('GST')->unique()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_profile');
    }
};
