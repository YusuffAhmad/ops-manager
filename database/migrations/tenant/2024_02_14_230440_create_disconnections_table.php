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
        Schema::create('disconnections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers');
            $table->decimal('amount_owed', 10, 2);
            $table->decimal('amount_to_pay', 10, 2);
            $table->date('date_logged');
            $table->string('reason');
            $table->string('reported_by');
            $table->foreignId('approved_by')->nullable()->constrained('users');
            $table->string('status');
            $table->date('date_disconnected')->nullable();
            $table->date('date_approved')->nullable();
            $table->foreignId('disconnected_by')->nullable()->constrained('users');
            $table->string('disconnection_image')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disconnections');
    }
};
