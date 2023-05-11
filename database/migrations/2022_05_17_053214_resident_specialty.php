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
        Schema::create('resident_specialty', function (Blueprint $table) {
            $table->id();
            $table->foreignId('resident_id')->nullable()->constrained('residents')->onDelete('set null');
            $table->foreignId('specialty_id')->nullable()->constrained('specialties')->onDelete('set null');
            $table->string('registration_date')->nullable();
            $table->string('registration_number')->nullable();//
            $table->string('status')->nullable();
            $table->date('graduation_date')->nullable();//تاريخ التخرج
            $table->string('start_training')->nullable();//تاريخ بدء التريب
            $table->string('end_training')->nullable();//تاريخ بدء التريب
            $table->string('training_document')->nullable();//استمارة مباشرة التدريب
            /**first_exam  && final_exam has false  value if the exam required*/
            $table->boolean('first_exam')->nullable();
            $table->boolean('final_exam')->nullable();
            $table->date('start_previous_training')->nullable();//تاريخ التدريب قبل التسيجل
            $table->date('end_previous_training')->nullable();// تاريخ نهاية التدريب قبل التسجيل
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
        Schema::dropIfExists('resident_specialty');
    }
};
