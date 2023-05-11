<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cycle extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'type',
        'year',
    ];
    /**
     * Get all of the Exams for the Cycle
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Exams()
    {
        return $this->hasMany(Exam::class, 'foreign_key', 'local_key');
    }
}
