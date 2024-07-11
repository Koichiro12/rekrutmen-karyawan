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
        if(!Schema::hasTable('job_seekers')){
        Schema::create('job_seekers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('jobseeker_image');
            $table->string('nik');
            $table->string('name');
            $table->date('date_birth');
            $table->string('place_birth');
            $table->string('gender');
            $table->text('address');
            $table->string('domisili');
            $table->string('phone_number');
            $table->string('email');
            $table->string('status_residence');
            $table->string('married_status');
            $table->string('citizen');
            $table->string('relegion');
            $table->string('npwp')->nullable();
            $table->timestamps();
        });
    }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_seekers');
    }
};
