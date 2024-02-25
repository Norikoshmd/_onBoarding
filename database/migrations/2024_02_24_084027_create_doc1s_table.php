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
        Schema::create('doc1s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('firstname',50);       
            $table->string('middlename',50)->nullable();
            $table->string('lastname',50);
            $table->string('namae',50)->nullable();
            $table->string('middlename_kana')->nullable();
            $table->string('myouji',50)->nullable();
            $table->date('dob');
            $table->string('marital_status',10);    
            $table->string('phone',50);
            $table->string('email')->unique();
            $table->string('c_postal',50);
            $table->string('c_address',50);
            $table->string('homecountry',50);
            $table->string('h_address',50);
            $table->string('h_postal',50);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doc1');
    }
};
