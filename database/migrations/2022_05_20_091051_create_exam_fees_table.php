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
        Schema::create('exam_fees', function (Blueprint $table) {
            $table->id();
            $table->string('value')->nullable();
            $table->date('payment_date')->nullable();
            $table->string('receipt_number')->nullable();
            $table->string('receipt_image')->nullable();
            $table->foreignId('resident_id')->references('id')->on('residents')->nullable()->constrained();
            $table->foreignId('exam_id')->references('id')->on('exams')->nullable()->constrained();
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
        Schema::dropIfExists('exam_fees');
    }
};
