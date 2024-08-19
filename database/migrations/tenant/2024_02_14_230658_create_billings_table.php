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
        Schema::create('billings', function (Blueprint $table) {
            $table->id('bill_id');
            $table->foreignId('customer_id')->constrained('customers');
            $table->date('bill_date');
            $table->date('due_date');
            $table->integer('consumption');
            $table->decimal('arrears', 10, 2);
            $table->decimal('vat', 10, 2);
            $table->decimal('current_charge', 10, 2);
            $table->decimal('total_charge', 10, 2);
            $table->decimal('total_due', 10, 2);
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billings');
    }
};
