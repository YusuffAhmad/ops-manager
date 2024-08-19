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
        Schema::create('enumerations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('city');
            $table->string('lga');
            $table->string('state');
            $table->string('address');
            $table->string('account_number');
            $table->string('property_use');
            $table->string('title');
            $table->string('gender');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->foreignId('tariff_id')->constrained('tariffs', 'tariff_id'); // Adjusted foreign key constraint
            $table->foreignId('dt_id')->constrained('distribution_transformers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enumerations');
    }
};
