<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reset_password', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->integer('user_id')->index('user_id_complaint_index');
            $table->enum('user_role', ['users', 'merchants']);
            $table->string('name');
            $table->string('phone_number');
            $table->dateTime('request_at');
            $table->dateTime('resolve_at')->nullable();
            $table->enum('status', ['pending', 'done'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reset_password');
    }
};
