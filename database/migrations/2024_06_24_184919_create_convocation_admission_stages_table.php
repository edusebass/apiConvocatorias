<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('convocation_admission_stages', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('admission_stage_id')->nullable();
            $table->uuid('convocation_id')->nullable();
            $table->tinyInteger('step');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->timestamps();
            $table->softDeletes();
            $table->uuid('updated_by')->nullable();
            $table->uuid('created_by')->nullable();
            $table->uuid('deleted_by')->nullable();

            $table->foreign('admission_stage_id')->references('id')->on('admission_stages');
            $table->foreign('convocation_id')->references('id')->on('convocations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('convocation_admission_stages');
    }
};
