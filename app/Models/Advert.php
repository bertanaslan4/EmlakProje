<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    use HasFactory;
    protected $table = 'advert';

    protected $fillable = [
        'id',
        'uuid',
        'thumbnail',
        'rent_price',
        'deposit_price',
        'currency_id',
        'country_id',
        'state_id',
        'city_id',
        'address',
        'longitude',
        'latitude',
        'category_id',
        'user_id',
        'type_id',
        'is_active',
        'created_at',
        'updated_at',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function type() {
        return $this->belongsTo(AdvertType::class);
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

    public function features() {
        return $this->belongsToMany(Feature::class, 'feature_on_advert')
            ->withTimestamps();
    }

    public function facilities() {
        return $this->belongsToMany(Facility::class, 'facility_on_advert')
            ->withPivot('value')
            ->with(['descriptions' => function ($query) {
                $query->where('lang_id', '=', 1);
            }]);
    }

    public function propertyDetails() {
        return $this->belongsToMany(PropertyDetail::class, 'property_detail_on_advert')
            ->withPivot('value')
            ->withTimestamps();
    }

    public function descriptions() {
        return $this->hasMany(AdvertDesc::class);
    }

    public function gallery(){
        return $this->hasMany(Gallery::class);
    }

    public function currency(){
        return $this->belongsTo(Currency::class);
    }

    public function advertApplication(){
        return $this->hasMany(AdvertApplication::class);
    }
}
