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
        Schema::create('distribution_transformers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->constrained('stores'); 
            $table->string('name');
            $table->double('lng'); 
            $table->double('lat'); 
            $table->date('installation_date');
            $table->integer('capacity');
            $table->string('status');
            $table->integer('rating');
            $table->string('maker');
            $table->string('feeder_pillar_type');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distribution_transformers');
    }
};
