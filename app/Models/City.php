<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table = 'cities';

    protected $guarded = [
        'id',
        'name',
        'state_id',
        'country_id',
    ];
    public static function create(array $array)
    {
        return self::query()->create($array);
    }

    public function state() {
        return $this->belongsTo(State::class);
    }

    public function country() {
        return $this->belongsTo(Country::class);
    }
}