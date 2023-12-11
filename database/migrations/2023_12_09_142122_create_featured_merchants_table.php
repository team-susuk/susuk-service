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
        Schema::create('featured_merchants', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignId('merchant_id')->nullable()->references('id')->on('merchants')->cascadeOnDelete();
            $table->foreignId('order_id')->nullable()->references('id')->on('orders')->cascadeOnDelete();
            $table->enum('category',['top_merchant','new_merchant'])->index();
            $table->date('start_at')->index();
            $table->date('expired_at')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('top_merchants');
    }
};
