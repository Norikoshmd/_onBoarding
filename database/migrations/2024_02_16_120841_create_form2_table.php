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
        Schema::create('form2', function (Blueprint $table) {
            $table->id();
            $table->string('firstname1',30);
            $table->string('lastname1',30);
            $table->string('relationship1',100);
            $table->string('postal1')->nullable();
            $table->string('address1')->nullable();
            $table->string('email1',50);
            $table->string('phone1',30)->nullable();
            $table->string('firstname2',30);
            $table->string('lastname2',30);
            $table->string('relationship2',100);
            $table->string('postal2',30)->nullable();
            $table->string('address2',30)->nullable();
            $table->string('email2',50);
            $table->string('phone2',30)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form2');
    }
};
