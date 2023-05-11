<?php

use App\Models\Resident;
use App\Models\Specialty;
use App\Models\State;
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
        Schema::create('state_resident', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->date('start');
            $table->date('end')->nullable();
            $table->string('cu_state')->nullable();
            $table->string('reason')->nullable();
            $table->foreignIdFor(State::class);
            $table->foreignIdFor(Resident::class);
            $table->foreignIdFor(Specialty::class);
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
        Schema::dropIfExists('state_resident');
    }
};
