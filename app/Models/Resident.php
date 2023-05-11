<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Resident extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'residents';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'status',
        'name_en',
        'father_en',
        'mother_en',
        'livingplace',
        'graduation_result',
        'graduation_year',
        'registration_date',
        'personal_picture',
        'university_degree',
        'graduation_notice',
        'id_card',
        'syndication_document',
        'practicing_profession',
        'p_status',
        'user_id',
    ];

    // public function  getPersonalPictureAttribute($val)
    // {
    //     return ($val !== null) ? asset('assets/images/residents/personal_picture/' . $val) : "";
    // }
    // public function  getUniversityDgreeAttribute($val)
    // {
    //     return ($val !== null) ? asset('assets/images/residents/university_degree/' . $val) : "";
    // }
    // public function  getGraduationNoticeAttribute($val)
    // {
    //     return ($val !== null) ? asset('assets/images/residents/graduation_notice/' . $val) : "";
    // }
    // public function  getIdCardAttribute($val)
    // {
    //     return ($val !== null) ? asset('assets/images/residents/id_card/' . $val) : "";
    // }
    // public function  getSyndicationDocumentAttribute($val)
    // {
    //     return ($val !== null) ? asset('assets/images/residents/syndication_document/' . $val) : "";
    // }
    // public function  getPracticingProfessionAttribute($val)
    // {
    //     return ($val !== null) ? asset('assets/images/residents/practicing_profession/' . $val) : "";
    // }
    /**
     * Get the User that owns the Resident
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    /**
     * The Specialties that belong to the Resident
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Specialties()
    {
        return $this->belongsToMany(Specialty::class, 'resident_specialty', 'resident_id', 'specialty_id')->withPivot('registration_date', 'registration_number', 'status', 'graduation_date', 'start_training', 'end_training', 'training_document', 'first_exam', 'final_exam', 'start_previous_training', 'end_previous_training')->withTimestamps();
    }
    /**
     * Get all of the ExamFees for the Resident
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ExamFees(): HasMany
    {
        return $this->hasMany(ExamFee::class, 'resident_id');
    }
    /**
     * Get all of the PreviousTrainings for the Resident
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function PreviousTrainings()
    {
        return $this->hasMany(PreviousTraining::class, 'resident_id');
    }
    /**
     * Get all of the Results for the Resident
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Results()
    {
        return $this->hasMany(Result::class, 'resident_id');
    }
    /**
     * The Exams that belong to the Resident
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Exams()
    {
        return $this->belongsToMany(Exam::class, 'exam_resident', 'resident_id', 'exam_id');
    }
    /**
     * Get all of the ResidenceYear for the Resident
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ResidenceYear()
    {
        return $this->hasMany(ResidenceYear::class, 'resident_id');
    }
    /**
     * The Vacation that belong to the Resident
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Vacations(): BelongsToMany
    {
        return $this->belongsToMany(Vacation::class, 'vacation_resident', 'resident_id', 'vacation_id')->withPivot('specialty_id', 'start', 'end', 'status', 'reason', 'file')->withTimestamps();
    }
    /**
     * The Penalties that belong to the Resident
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Penalties(): BelongsToMany
    {
        return $this->belongsToMany(Penalty::class, 'penalty_resident', 'resident_id', 'penalty_id')->withPivot('specialty_id', 'date', 'start', 'end', 'reason')->withTimestamps();
    }
    /**
     * The States that belong to the Resident
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function States(): BelongsToMany
    {
        return $this->belongsToMany(State::class, 'state_resident', 'resident_id', 'state_id')->withPivot('id', 'specialty_id', 'date', 'start', 'end', 'cu_state', 'reason')->withTimestamps();
    }
    /**
     * Get all of the Deprivations for the Resident
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Deprivations(): HasMany
    {
        return $this->hasMany(Deprivation::class);
    }
    /**
     * Get all of the Apologies for the Resident
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Apologies(): HasMany
    {
        return $this->hasMany(Apology::class);
    }
}
