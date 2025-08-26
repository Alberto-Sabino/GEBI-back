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
        Schema::create('children', function (Blueprint $table) {
            $table->id();
            $table->string('fullName');
            $table->date('birthDate');
            $table->string('commonCongregation');
            $table->char('gender', 1)->comment('M or F');
            $table->timestamps();

            $table->index('fullName');
            $table->index('birthDate');
            $table->index('commonCongregation');
            $table->index('gender');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('children');
    }
};
