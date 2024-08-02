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
        Schema::create('user_psikotest_answers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('apply_job_id');
            $table->bigInteger('test_id');
            $table->string('answer_test');
            $table->string('user_answer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_psikotest_answers');
    }
};
