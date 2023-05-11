<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Committee extends Model
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
        'specialty_id',
    ];
    /**
     * The Admins that belong to the Committee
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_committee', 'committee_id','user_id');
    }
    /**
     * Get the Specialty that owns the Committee
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Specialty()
    {
        return $this->belongsTo(Specialty::class, 'specialty_id');
    }
}
