<?php

namespace App\Models;

use App\Enums\Profession;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'salutation',
        'street',
        'street_number',
        'address_suffix',
        'postal_code',
        'country_id',
        'state_id',
        'city_id',
        'phone',
        'dob',
        'proffession',
        'eu_citizen',
        'nationality_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'proffession' => Profession::class,
    ];
    public static function create(array $array)
    {
        return self::query()->create($array);
    }

    public function country() {
        return $this->belongsTo(Country::class);
    }

    public function state() {
        return $this->belongsTo(State::class);
    }

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function adverts() {
        return $this->hasMany(Advert::class);
    }

    public function appliedAdverts()
    {
        return $this->hasMany(AdvertApplication::class, 'user_id', 'id')->with('advert');
    }
}
