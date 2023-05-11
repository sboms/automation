<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamCenter extends Model
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
        'place',
        'type',
    ];
    /**
     * The Exams that belong to the ExamCenter
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Exams()
    {
        return $this->belongsToMany(Exam::class, 'role_user_table', 'user_id', 'role_id');
    }
    /**
     * Get all of the Results for the ExamCenter
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Results()
    {
        return $this->hasMany(Result::class,'center_id');
    }

}
