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
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uid')->unique();
            $table->string('account_number')->unique();
            $table->string('meter_number')->unique();
            $table->string('customer_type');
            $table->string('account_type');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('lga')->nullable();
            $table->double('lng')->nullable();
            $table->double('lat')->nullable();
            $table->unsignedBigInteger('dt_id');
            $table->foreign('dt_id')->references('id')->on('distribution_transformers')->onDelete('cascade');
            $table->unsignedBigInteger('tariff_id');
            $table->foreign('tariff_id')->references('tariff_id')->on('tariffs')->onDelete('cascade');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
