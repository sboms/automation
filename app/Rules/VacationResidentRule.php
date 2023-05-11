<?php

namespace App\Rules;

use App\Models\Resident;
use App\Models\Specialty;
use App\Models\Vacation;
use Illuminate\Contracts\Validation\Rule;
use DateTime;

class VacationResidentRule implements Rule
{
    public $vacation;
    public $resident;
    public $specialty;
    public $msg;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($vacationId, Resident $resident, Specialty $specialty)
    {
        $this->vacation = $vacationId;
        $this->resident = $resident;
        $this->specialty = $specialty;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        /** Vacation Currently Required */
        $cuVacation = Vacation::find($this->vacation);
        /**Find Current Resident */
        $resident = $this->resident;
        /**all resident vacation that same id */
        $allReVa = $resident->Vacations()->wherePivot('vacation_id', '=', $this->vacation)->get();
        /**Check the possibility of recurrence vacation */
        if ($cuVacation->repetition == "مرة واحدة" && $allReVa != null) {
            $this->msg = "هذه الإجازة تعطى مرة واحدة في العمر ولدى المقيم الحالي إجازة من هذا النوع";
            return false;
        }
        $year = date('Y');
        if ($cuVacation->maxdayinyear != null) {
            $days = 0;
            $va = $resident->Vacations()->where('vacation_resident.vacation_id', $cuVacation->id)->whereYear('vacation_resident.start', $year)->get(['vacation_resident.start', 'vacation_resident.end']);
            foreach ($va as $value) {
                $start = new DateTime($value->start);
                $end = new DateTime($value->end);
                $interval = $start->diff($end);
                $days += $interval->format('%a');
            }
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->msg;
    }
}
