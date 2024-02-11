<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyDetail extends Model
{
    use HasFactory;
    protected $table = 'property_detail';

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
        return $this->belongsToMany(Advert::class, 'property_detail_on_advert')
            ->withPivot('value')
            ->with('descriptions')
            ->withTimestamps();
    }

    public function descriptions() {
        return $this->hasMany(PropertyDetailDesc::class);
    }

}
