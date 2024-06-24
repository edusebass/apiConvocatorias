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
        Schema::create('applicants', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('person_id');
            $table->uuid('convocation_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->uuid('updated_by')->nullable();
            $table->uuid('created_by')->nullable();
            $table->uuid('deleted_by')->nullable();

            $table->foreign('convocation_id')->references('id')->on('convocations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};
