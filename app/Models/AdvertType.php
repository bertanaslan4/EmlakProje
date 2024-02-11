<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertType extends Model
{
    use HasFactory;
    protected $table = 'advert_type';
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
        return $this->hasMany(Advert::class);
    }

    public function descriptions() {
        return $this->hasMany(AdvertTypeDesc::class);
    }

}
