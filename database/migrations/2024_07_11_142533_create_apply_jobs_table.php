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
        Schema::create('apply_jobs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('jobseeker_id');
            $table->bigInteger('job_id');
            $table->string('test_result');
            $table->string('test_status')->default('0');
            $table->string('psikotes_result');
            $table->string('psikotes_status')->default('0');
            $table->string('status_apply');
            $table->date('date_apply');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apply_jobs');
    }
};
