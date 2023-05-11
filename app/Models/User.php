<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'last_name',
        'gender',
        'phone',
        'father',
        'mother',
        'birthplace',
        'birthdate',
        'workplace',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'birthdate' => 'date',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var
     */
    public function  getBirthdateAttribute($value)
    {
        return (new Carbon($value))->format('d/m/Y');
    }



    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
    public function Resident()
    {
        return $this->hasOne(Resident::class, 'user_id');
    }
    /**
     * The Committees that belong to the Admin
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Committees(): BelongsToMany
    {
        return $this->belongsToMany(Committee::class, 'user_committee', 'user_id', 'committee_id');
    }
}
