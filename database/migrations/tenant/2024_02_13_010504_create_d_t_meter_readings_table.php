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
        Schema::create('d_t_meter_readings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dt_id')->constrained('distribution_transformers');
            $table->foreignId('user_id')->constrained('users');
            $table->integer('previous_reading');
            $table->integer('present_reading');
            $table->integer('consumption')->virtualAs('present_reading - previous_reading');
            $table->date('reading_date');
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_t_meter_readings');
    }
};
