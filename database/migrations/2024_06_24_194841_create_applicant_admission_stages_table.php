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
        Schema::create('applicant_admission_stages', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('convocation_admission_stage_id');
            $table->uuid('applicant_id')->nullable();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->timestamps();
            $table->softDeletes();
            $table->uuid('updated_by')->nullable();
            $table->uuid('created_by')->nullable();
            $table->uuid('deleted_by')->nullable();

            $table->foreign('applicant_id')->references('id')->on('applicants')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicant_admission_stages');
    }
};
