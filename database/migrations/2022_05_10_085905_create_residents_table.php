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
        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            $table->string('status')->nullable();
            $table->string('name_en')->nullable();
            $table->string('father_en')->nullable();
            $table->string('mother_en')->nullable();
            $table->string('livingplace')->nullable();
            $table->integer('graduation_result')->nullable();#
            $table->date('graduation_year')->nullable();#
            $table->date('registration_date')->nullable();
            $table->string('p_status')->nullable();
            $table->string('personal_picture')->nullable();
            $table->string('university_degree')->nullable();//صورة درجة جامعية
            $table->string('graduation_notice')->nullable();//صورة إشعار التخرج
            $table->string('id_card')->nullable();//صورة البطاقة الشخصية
            $table->string('syndication_document')->nullable();//الوثيقة النقابية
            $table->string('practicing_profession')->nullable();//ترخيص مزاولة المهنة
            $table->foreignId('user_id')->references('id')->on('users')->nullable()->constrained();
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
        Schema::dropIfExists('residents');
    }
};
