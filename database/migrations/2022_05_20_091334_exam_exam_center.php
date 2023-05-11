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
        Schema::create('exam_exam_center', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exam_id')->nullable()->constrained('exams')->onDelete('set null');
            $table->foreignId('center_id')->nullable()->constrained('exam_centers')->onDelete('set null');
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
        Schema::dropIfExists('exam_exam_center');
    }
};
