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
        Schema::create('d_t_complaints', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dt_id')->constrained('distribution_transformers');
            $table->string('title');
            $table->string('sub_title')->nullable();
            $table->text('description');
            $table->string('image')->nullable();
            $table->string('region');
            $table->string('hub');
            $table->string('service_center');
            $table->string('address');
            $table->string('reported_by');
            $table->string('status');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_t_complaints');
    }
};
