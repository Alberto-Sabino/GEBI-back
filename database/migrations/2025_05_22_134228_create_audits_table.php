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
        Schema::create('audits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('child_id')->nullable();
            $table->unsignedBigInteger('guardian_id')->nullable();
            $table->string('action');
            $table->date('date');
            $table->time('time');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('child_id')
                ->references('id')
                ->on('children')
                ->onDelete('cascade');

            $table->foreign('guardian_id')
                ->references('id')
                ->on('guardians')
                ->onDelete('cascade');

            $table->index('user_id');
            $table->index('child_id');
            $table->index('guardian_id');
            $table->index(['date', 'time']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audits');
    }
};
