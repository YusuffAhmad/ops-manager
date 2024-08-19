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
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid')->unique();
            $table->string('name');
            $table->unsignedBigInteger('super_id')->unsigned();
            $table->unsignedBigInteger('storelevel_id')->unsigned();
            $table->string('storelevel_name');
            $table->boolean('status')->default(true);
            $table->string('address')->nullable();
            $table->string('State')->nullable();
            $table->string('city')->nullable();
            $table->string('LGA')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
