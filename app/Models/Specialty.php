<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Specialty extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'name',
        'name_en',
        'number_of_years',
        'code',
        'type',
    ];

    /**
     * The Residents that belong to the Specialty
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Residents()
    {
        return $this->belongsToMany(Resident::class, 'resident_specialty', 'specialty_id', 'resident_id')->withPivot('registration_date', 'registration_number', 'status', 'graduation_date', 'start_training', 'end_training', 'training_document', 'first_exam', 'final_exam', 'start_previous_training', 'end_previous_training')->withTimestamps();
    }
    /**
     * Get all of the PreviousTrainings for the Specialty
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function PreviousTrainings()
    {
        return $this->hasMany(PreviousTraining::class, 'specialty_id');
    }
    /**
     * Get all of the Exams for the Specialty
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Exams()
    {
        return $this->hasMany(Exam::class, 'specialty_id');
    }
    /**
     * Get all of the ResidenceYear for the Specialty
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ResidenceYear()
    {
        return $this->hasMany(ResidenceYear::class, 'specialty_id');
    }
    /**
     * The Vacations that belong to the Specialty
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Vacations(): BelongsToMany
    {
        return $this->belongsToMany(Vacation::class, 'vacation_resident', 'specialty_id', 'vacation_id')->withPivot('resident_id', 'start', 'end', 'status', 'reason', 'file')->withTimestamps();
    }
    /**
     * Get the Committee associated with the Specialty
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Committee(): HasOne
    {
        return $this->hasOne(Committee::class, 'specialty_id');
    }
    /**
     * The Penalties that belong to the Specialty
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Penalties(): BelongsToMany
    {
        return $this->belongsToMany(Penalty::class, 'penalty_resident', 'specialty_id', 'penalty_id')->withPivot('resident_id', 'start', 'end')->withTimestamps();
    }
    /**
     * The States that belong to the Specialty
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function States(): BelongsToMany
    {
        return $this->belongsToMany(State::class, 'state_resident', 'specialty_id', 'state_id')->withPivot('id', 'resident_id', 'date', 'start', 'end', 'cu_state', 'reason')->withTimestamps();
    }
}
