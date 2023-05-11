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
        Schema::create('residence_years', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('number');
            $table->string('state');
            $table->string('comment')->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
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
        Schema::dropIfExists('residence_years');
    }
};
