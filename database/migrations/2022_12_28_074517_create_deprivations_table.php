<?php

use App\Models\Exam;
use App\Models\Resident;
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
        Schema::create('deprivations', function (Blueprint $table) {
            $table->id();
            $table->string("reason")->nullable();
            $table->date("date")->nullable();
            $table->foreignIdFor(Resident::class);
            $table->foreignIdFor(Exam::class);
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
        Schema::dropIfExists('deprivations');
    }
};
