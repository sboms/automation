<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Apology extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'date',
        'state',
        'reason',
        'explan',
        'comment',
        'allfile',
        'resident_id',
        'exam_id',
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'state' => 'boolean',
    ];

    /**
     * add Apollogy attributes state true OR false
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function state(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value == 0 ? false : true,
            set: fn ($value) => $value == "true" ? true : false,
        );
    }
    /**
     * Get the Resident that owns the Apology
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Resident(): BelongsTo
    {
        return $this->belongsTo(Resident::class, 'resident_id');
    }
    /**
     * Get the Exam that owns the Apology
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Exam(): BelongsTo
    {
        return $this->belongsTo(Exam::class, 'exam_id');
    }
}