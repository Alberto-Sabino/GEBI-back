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
        Schema::create('class_rooms', function (Blueprint $table) {
            $table->id();
            $table->string('theme', 255);
            $table->date('date');
            $table->string('city', 100);
            $table->unsignedBigInteger('creator_id');

            $table->foreign('creator_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->index('theme');
            $table->index('date');
            $table->index('city');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_rooms');
    }
};
