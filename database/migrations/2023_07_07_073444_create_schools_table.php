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
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->date('dateOfBirth')->nullable();
            $table->string('gender', 1)->nullable();
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('img', 255)->nullable();
            $table->string('emergencyEmail', 100)->nullable();
            $table->string('emergencyName', 100)->nullable();
            $table->string('emergencyAddress', 100)->nullable();
            $table->string('majorPreference', 100)->nullable();
            $table->integer('registerType');
            $table->integer('identifyType');
            $table->string('natHighschool', 100)->nullable();
            $table->string('natGraduatedYear', 10)->nullable();
            $table->string('natGrade', 10)->nullable();
            $table->string('natTotalScore')->nullable();
            $table->string('natExamCenter', 255)->nullable();
            $table->string('natExamSeat', 10)->nullable();
            $table->string('natExamYear')->nullable();
            $table->string('isLocal', 100)->nullable();
            $table->string('semester', 100)->nullable();
            $table->string('about', 100)->nullable();
            $table->string('phoneNumber', 100)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('highSchoolDiploma')->nullable();
            $table->string('highSchoolTranscript')->nullable();
            $table->string('oldUniName', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('highSchoolName', 100)->nullable();
            $table->string('isPermernant')->nullable();
            $table->string('currentAddress')->nullable();
            $table->string('permanentAddress')->nullable();
            $table->string('emergencyPh')->nullable();
            $table->string('oldUniCountry')->nullable();
            $table->string('oldUniMajor')->nullable();
            $table->string('oldUniCredit')->nullable();
            $table->string('emergencyRelationship')->nullable();
            $table->date('startDate')->nullable();
            $table->date('endDate')->nullable();
            $table->string('examCertificate')->nullable();
            $table->string('englishProficient')->nullable();
            $table->string('idImg')->nullable();
            $table->string('studentType')->nullable();
            $table->char('status',1)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};
