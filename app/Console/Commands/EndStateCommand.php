<?php

namespace App\Console\Commands;

use App\Models\Specialty;
use App\Models\State;
use Illuminate\Console\Command;

class EndStateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'State:End';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $states = State::all();
        foreach ($states as $state) {
            $residents = $state->Residents()->wherePivot('end', '<', date('Y-m-d'))->get();
            foreach ($residents as $resident) {
                $specialty = Specialty::find($resident->pivot->specialty_id);

                $cuState = $resident->pivot->cu_state;
                // $re = $specialty->Residents()->wherePivot('resident_id', $resident->id)->get();
                // return $re;

                $residentNewState = $specialty->Residents()->wherePivot('resident_id', $resident->id)->first();
                $newState = $residentNewState->pivot->status;
                //return $newState . ' .' . $cuState;
                $state->Residents()->wherePivot('specialty_id', $specialty->id)->updateExistingPivot($resident->id, [
                    'cu_state' => $newState,
                ]);
                $specialty->Residents()->wherePivot('resident_id', $resident->id)->updateExistingPivot($resident->id, [
                    'status' => $cuState,
                ]);
            }
        }
        return 0;
    }
}
