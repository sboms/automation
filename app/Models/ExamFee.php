<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ExamFee extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'value',
        'payment_date',
        'receipt_number',
        'receipt_image',
        'resident_id',
        'exam_id',
    ];
    /**
     * Get the Exam that owns the ExamFee
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Exam()
    {
        return $this->belongsTo(Exam::class, 'exam_id');
    }
    /**
     * Get the Resident that owns the ExamFee
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Resident(): BelongsTo
    {
        return $this->belongsTo(Resident::class, 'resident_id');
    }
}
