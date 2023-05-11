<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Deprivation extends Model
{

    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'reason',
        'date',
        'resident_id',
        'exam_id',
    ];

    /**
     * Get the Resident that owns the Deprivation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Resident(): BelongsTo
    {
        return $this->belongsTo(Resident::class);
    }

    /**
     * Get the Exam that owns the Deprivation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Exam(): BelongsTo
    {
        return $this->belongsTo(Exam::class);
    }
}
