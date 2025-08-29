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
        Schema::create('class_room_children', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('class_room_id');
            $table->unsignedBigInteger('child_id');
            $table->unsignedBigInteger('guardian_id');
            $table->unsignedBigInteger('user_id');
            $table->string('entry_at', 5)->comment('hh:mm');
            $table->string('exit_at', 5)->nullable()->comment('hh:mm');

            $table->foreign('class_room_id')
                ->references('id')
                ->on('class_rooms')
                ->onDelete('no action');

            $table->foreign('guardian_id')
                ->references('id')
                ->on('guardians')
                ->onDelete('no action');

            $table->foreign('child_id')
                ->references('id')
                ->on('children')
                ->onDelete('no action');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('no action');

            $table->index('class_room_id');
            $table->index('child_id');
            $table->index('guardian_id');
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_room_children');
    }
};
