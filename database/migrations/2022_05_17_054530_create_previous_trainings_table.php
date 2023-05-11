<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('previous_trainings', function (Blueprint $table) {
            $table->id();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('hospital_name')->nullable();
            $table->string('hospital_place')->nullable();
            $table->string('official_name')->nullable();
            $table->string('official_phone')->nullable();
            $table->string('official_email')->nullable();
            $table->string('pr_document')->nullable();
            $table->foreignId('resident_id')->references('id')->on('residents')->constrained();
            $table->foreignId('specialty_id')->references('id')->on('specialties')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('previous_trainings');
    }
};
