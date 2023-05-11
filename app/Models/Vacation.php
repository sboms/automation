<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use phpDocumentor\Reflection\PseudoTypes\False_;

class Vacation extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'vacations';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'maxday',
        'maxdayinyear',
        'repetition',
        'salarydeduction',
        'recompense'
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'repetition' => 'boolean',
        'salarydeduction' => 'boolean',
        'recompense' => 'boolean',
    ];
    /**
     * Interact with the Vacation's repetition.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function repetition(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value == true ? 'مكررة' : 'مرة واحدة' ,
            set: fn ($value) => $value == "on" ? true : false,
        );
    }
    /**
     * Interact with the Vacation's salarydeduction.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function salarydeduction(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value == true ? 'مدفوعة' : 'غير مدفوعة' ,
            set: fn ($value) => $value == "on" ? true : false,
        );
    }
    /**
     * Interact with the Vacation's recompense.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function recompense(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value == true ? 'محتسبة' : 'غير محتسبة' ,
            set: fn ($value) => $value == "on" ? true : false,
        );
    }
    /**
     * The Resident that belong to the Vacation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Residents(): BelongsToMany
    {
        return $this->belongsToMany(Resident::class, 'vacation_resident','vacation_id','resident_id')->withPivot('specialty_id','start','end','status','reason','file')->withTimestamps();
    }
    /**
     * The Specialties that belong to the Vacation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Specialties(): BelongsToMany
    {
        return $this->belongsToMany(Specialty::class, 'vacation_resident','vacation_id','specialty_id')->withPivot('resident_id','start','end','status','reason','file')->withTimestamps();
    }
}
