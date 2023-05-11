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
        Schema::create('penalty_resident', function (Blueprint $table) {
            $table->id();
            $table->foreignId('resident_id')->nullable()->constrained('residents')->onDelete('set null');
            $table->foreignId('penalty_id')->nullable()->constrained('penalties')->onDelete('set null');
            $table->foreignId('specialty_id')->nullable()->constrained('specialties')->onDelete('set null');
            $table->date('date');
            $table->date('start')->nullable();
            $table->date('end')->nullable();
            $table->string('reason')->nullable();
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
        //
    }
};
