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
            $table->id();
            $table->string('fullName', 100);
            $table->string('document', 11)->unique();
            $table->string('password', 30);
            $table->date('birthDate', 8);
            $table->integer('baptismYear');
            $table->string('phone', 11);
            $table->string('email', 100)->nullable();
            $table->string('city', 100);
            $table->string('commonCongregation', 100);
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
