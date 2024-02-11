<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;
    protected $table = 'facility';
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
    public static function create(array $array)
    {
        return self::query()->create($array);
    }
    public function adverts() {
        return $this->belongsToMany(Advert::class, 'facility_on_advert')
            ->withPivot('value')
            ->with('descriptions')
            ->withTimestamps();
    }

    public function descriptions() {
        return $this->hasMany(FacilityDesc::class);
    }

}
