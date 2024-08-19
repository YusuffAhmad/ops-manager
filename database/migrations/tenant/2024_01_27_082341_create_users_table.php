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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uid')->unique();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('phone')->nullable();
            $table->integer('store_id');
            $table->dateTime('date_of_birth');
            $table->string('store_name');
            $table->boolean('status')->default(true);
            $table->string('address')->nullable();
            $table->string('State')->nullable();
            $table->string('city')->nullable();
            $table->string('LGA')->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
