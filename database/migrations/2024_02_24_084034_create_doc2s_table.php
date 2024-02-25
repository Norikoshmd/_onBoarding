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
        Schema::create('doc2s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('firstname1',30);
            $table->string('lastname1',30);
            $table->string('relationship1',100);
            $table->string('postal1')->nullable();
            $table->string('address1')->nullable();
            $table->string('email1',255);
            $table->string('phone1',30)->nullable();
            $table->string('firstname2',30)->nullable();
            $table->string('lastname2',30)->nullable();
            $table->string('relationship2',100)->nullable();
            $table->string('postal2',30)->nullable();
            $table->string('address2',30)->nullable();
            $table->string('email2',255)->nullable();
            $table->string('phone2',30)->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doc2');
    }
};
