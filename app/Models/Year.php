<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'years';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','name','name_number'];
    /**
     * The Residents that belong to the Year
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Residents()
    {
        return $this->belongsToMany(Resident::class, 'resident_years', 'resident_id', 'year_id')->withPivot('start_date','end_date','state','comment','specialty_id')->withTimestamps();
    }
    /**
     * The Specialties that belong to the Year
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Specialties()
    {
        return $this->belongsToMany(Specialty::class, 'resident_years', 'specialty_id', 'year_id')->withPivot('start_date','end_date','state','comment','resident_id')->withTimestamps();
    }
}

