<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class State extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'States';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'new_state',
    ];
    /**
     * The Residents that belong to the State
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Residents(): BelongsToMany
    {
        return $this->belongsToMany(Resident::class, 'state_resident', 'state_id', 'resident_id')->withPivot('id', 'specialty_id', 'date', 'start', 'end', 'cu_state', 'reason')->withTimestamps();
    }
    /**
     * The Specialties that belong to the State
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Specialties(): BelongsToMany
    {
        return $this->belongsToMany(Specialty::class, 'state_resident', 'specialty_id', 'state_id')->withPivot('id', 'resident_id', 'date', 'start', 'end', 'cu_state', 'reason')->withTimestamps();
    }
}
