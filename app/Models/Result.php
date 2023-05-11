<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'exam_id',
        'center_id',
        'resident_id',
        'value',
    ];
    /**
     * Get the Exams that owns the Result
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Exam()
    {
        return $this->belongsTo(Exam::class, 'exam_id');
    }

    /**
     * Get the Residents that owns the Result
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Resident()
    {
        return $this->belongsTo(Resident::class, 'resident_id');
    }
    /**
     * Get the ExamCenters that owns the Result
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ExamCenters()
    {
        return $this->belongsTo(ExamCenter::class, 'center_id');
    }
}