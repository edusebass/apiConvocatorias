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
        Schema::create('convocations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->boolean('accept_foreigners');
            $table->uuid('study_plan_id');
            $table->timestamps();
            $table->softDeletes();
            $table->uuid('updated_by')->nullable();
            $table->uuid('created_by')->nullable();
            $table->uuid('deleted_by')->nullable();
            $table->string("prefix");
            $table->integer('applicant_limit');
            $table->uuid('cycle_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('convocations');
    }
};
