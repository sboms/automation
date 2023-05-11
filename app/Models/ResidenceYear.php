<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidenceYear extends Model
{
    use HasFactory;
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'name',
        'number',
        'state',
        'comment',
        'start_date',
        'end_date',
        'resident_id',
        'specialty_id',
    ];
    // /**
    //  * The attributes that should be cast.
    //  *
    //  * @var array
    //  */
    // protected $casts = [
    //     'start_date' => 'date',
    //     'end_date' => 'date',
    // ];
    /**
     * Get the Specialty that owns the ResidenceYear
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Specialty()
    {
        return $this->belongsTo(Specialty::class, 'specialty_id');
    }
    /**
     * Get the Resident that owns the ResidenceYear
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Resident()
    {
        return $this->belongsTo(Resident::class, 'resident_id');
    }
}
