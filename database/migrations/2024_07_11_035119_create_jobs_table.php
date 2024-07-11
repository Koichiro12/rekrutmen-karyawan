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
        if(!Schema::hasTable('jobs')){
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_name');
            $table->bigInteger('departement_id');
            $table->bigInteger('position_id');
            $table->integer('max_age');
            $table->string('min_education');
            $table->string('major_education')->nullable();
            $table->string('salary');
            $table->text('job_desc');
            $table->text('job_criteria');
            $table->string('status');
            $table->date('open_date');
            $table->date('close_date');
            $table->timestamps();
        });
    }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
