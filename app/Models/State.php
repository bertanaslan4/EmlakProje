<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $table = 'states';

    protected $guarded = [
        'id',
        'name',
        'country_id',
    ];
    public static function create(array $array)
    {
        return self::query()->create($array);
    }

    public function country() {
        return $this->belongsTo(Country::class);
    }
}
