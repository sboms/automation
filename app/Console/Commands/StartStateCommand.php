<?php

namespace App\Console\Commands;

use App\Models\Specialty;
use App\Models\State;
use Illuminate\Console\Command;

class StartStateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'State:Start';

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
            $residents = $state->Residents()->wherePivot('start', '<=', date('Y-m-d'))->wherePivot('end', '>', date('Y-m-d'))->get();
            foreach ($residents as $resident) {
                $specialty = Specialty::find($resident->pivot->specialty_id);
                $residentCuState = $specialty->Residents()->wherePivot('resident_id', $resident->id)->first();
                $cuState = $residentCuState->pivot->status;

                $state->Residents()->wherePivot('specialty_id', $specialty->id)->wherePivot('resident_id', $resident->id)->updateExistingPivot($residentCuState->id, [
                    'cu_state' => $cuState,
                ]);
                $specialty->Residents()->updateExistingPivot($resident->id, [
                    'status' => $state->new_state,
                ]);
            }
        }
        return 0;
    }
}
