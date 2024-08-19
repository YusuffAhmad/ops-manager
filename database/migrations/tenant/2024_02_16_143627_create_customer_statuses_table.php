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
        Schema::create('customer_statuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_number');
            $table->boolean("bill_is_distributed");
            $table->date('last_bill_distributed');
            $table->boolean("meter_is_read");
            $table->date('last_meter_read');
            $table->boolean("customer_is_enumerated");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_statuses');
    }
};
