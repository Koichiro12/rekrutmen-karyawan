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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('last_job_departement');
            $table->string('company_name');
            $table->string('last_job_position');
            $table->string('start_job');
            $table->string('end_job');
            $table->string('salary')->default('0');
            $table->string('intensive_pay')->default('0');
            $table->string('last_job_facility')->default('-');
            $table->text('reason_stop_working')->default('-');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
