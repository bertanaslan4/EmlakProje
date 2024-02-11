<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;
    protected $table = 'feature';

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
        return $this->belongsToMany(Advert::class, 'feature_on_advert')
            ->with('descriptions')
            ->withTimestamps();
    }

    public function descriptions() {
        return $this->hasMany(FeatureDesc::class);
    }
}
