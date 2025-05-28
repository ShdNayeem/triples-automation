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
        Schema::create('company_profile', function (Blueprint $table) {
            $table->id();
            $table->string('email_1');
            $table->string('email_2')->nullable();
            $table->string('door_no');
            $table->string('street');
            $table->string('pincode');
            $table->string('area');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->integer('mobile_1');
            $table->integer('mobile_2');
            $table->integer('landline_1');
            $table->integer('landline_2');
            $table->string('GST')->unique();
            $table->string('website')->nullable();
            $table->string('googleBusiness')->nullable();
            $table->string('facebook')->nullable();
            $table->string('youtube')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_profile');
    }
};
