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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('gender');
            $table->string('email')->unique();
            $table->string('visa_status',100);
            $table->date('startday');
            $table->string('workat',30);
            $table->longText('visa_f');
            $table->longText('visa_b');
            $table->longText('passport')->nullable();;
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
