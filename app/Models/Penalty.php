<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Penalty extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'penalties';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'count',
        'residence_effect',
    ];
    /**
     * Interact with the Penalty's residenceEffect.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function residenceEffect(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value == 0 ? false : true,
            set: fn ($value) => $value == "on" ? true : false,
        );
    }
    /**
     * The Residents that belong to the Penalty
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Residents(): BelongsToMany
    {
        return $this->belongsToMany(Resident::class, 'penalty_resident', 'resident_id', 'penalty_id')->withPivot('specialty_id', 'date', 'start', 'end', 'reason')->withTimestamps();
    }
    /**
     * The Specialties that belong to the Penalty
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Specialties(): BelongsToMany
    {
        return $this->belongsToMany(Specialty::class, 'penalty_resident', 'specialty_id', 'penalty_id')->withPivot('resident_id', 'start', 'end')->withTimestamps();
    }
}
