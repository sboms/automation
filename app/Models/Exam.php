<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Exam extends Model
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
        'exam_date',
        'specialty_id',
        'cycle_id',
    ];
    /**
     * The ExamCenters that belong to the Exam
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function ExamCenters()
    {
        return $this->belongsToMany(ExamCenter::class, 'exam_exam_center', 'exam_id', 'center_id');
    }
    /**
     * The Residents that belong to the Exam
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Residents()
    {
        return $this->belongsToMany(Resident::class, 'exam_resident', 'exam_id', 'resident_id');
    }
    /**
     * Get all of the ExamFees for the Exam
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ExamFees()
    {
        return $this->hasMany(ExamFee::class, 'exam_id');
    }
    /**
     * Get all of the Results for the Exam
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Results()
    {
        return $this->hasMany(Result::class, 'exam_id');
    }
    /** Has one Object from parent Table */
    /**
     * Get the Cycle that owns the Exam
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Cycle()
    {
        return $this->belongsTo(Cycle::class, 'cycle_id');
    }
    /**
     * Get the Specialty that owns the Exam
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Specialty()
    {
        return $this->belongsTo(Specialty::class, 'specialty_id');
    }
    /**
     * Get all of the Deprivations for the Exam
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Deprivations(): HasMany
    {
        return $this->hasMany(Deprivation::class);
    }
    /**
     * Get all of the Apologies that owns the Exam
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Apologies(): HasMany
    {
        return $this->hasMany(Apology::class);
    }
}