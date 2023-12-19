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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->integer('user_id')->index();
            $table->enum('user_role',['guest','merchant']);
            $table->string('type',40)->comment('get from price type enums');
            $table->string('image')->nullable();
            $table->string('benefit_value');
            $table->enum('benefit_type', ['day', 'month', 'product']);
            $table->double('price');
            $table->enum('status',['waiting_payment','paid','failed','expired']);
            $table->date('expired_at')->nullable();
            $table->dateTime('pay_at')->nullable();
            $table->json('data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
