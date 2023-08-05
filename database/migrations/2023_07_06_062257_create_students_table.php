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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('firstName',100);
            $table->string('lastName',100);
            $table->string('email',100);
            $table->string('phoneNumber',10);
            $table->string('password');
            $table->char('gender',1);
            $table->date('dateOfBirth',50);
            $table->string('address',255);
            $table->string('accessToken');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
