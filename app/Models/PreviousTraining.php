<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreviousTraining extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'start_date',
        'end_date',
        'hospital_name',
        'hospital_place',
        'official_name',
        'official_phone',
        'official_email',
        'pr_document',
        'resident_id',
        'specialty_id',
    ];
    /**
     * Get the Resident that owns the PreviousTraining
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Resident()
    {
        return $this->belongsTo(Resident::class, 'resident_id');
    }
    /**
     * Get the Specialty that owns the PreviousTraining
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Specialty()
    {
        return $this->belongsTo(Specialty::class, 'specialty_id');
    }


    public function setStartDateAttribute( $value ) {
        $this->attributes['start_date'] = (new Carbon($value))->format('d/m/y');
      }

    /**
     * Interact with the Vacation's start_date.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function start_date(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => (new Carbon($value))->format('y/m/d'),
            set: fn ($value) => (new Carbon($value))->format('y/m/d'),
        );
    }

}
