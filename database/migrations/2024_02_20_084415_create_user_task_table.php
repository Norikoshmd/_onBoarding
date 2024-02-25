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
        Schema::create('user_task', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('task_id');
            $table->unsignedBigInteger('doc1_id')->nullable();
            $table->unsignedBigInteger('doc2_id')->nullable();
            $table->unsignedBigInteger('doc3_id')->nullable();
            $table->unsignedBigInteger('doc4_id')->nullable();
            $table->unsignedBigInteger('doc5_id')->nullable();
            $table->unsignedBigInteger('doc6_id')->nullable();
            $table->unsignedBigInteger('doc7_id')->nullable();
            $table->unsignedBigInteger('doc8_id')->nullable();
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_task');
    }
};
