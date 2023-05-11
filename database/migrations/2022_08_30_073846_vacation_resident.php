<?php

use App\Models\Resident;
use App\Models\Specialty;
use App\Models\Vacation;
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
        Schema::create('vacation_resident', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Resident::class);
            $table->foreignIdFor(Vacation::class);
            $table->foreignIdFor(Specialty::class);
            $table->date('start');
            $table->date('end')->nullable();
            $table->boolean('status')->nullable();
            $table->text('reason')->nullable();
            $table->string('file')->nullable();
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
