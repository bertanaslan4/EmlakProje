<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertTypeDesc extends Model
{
    use HasFactory;
    protected $table = 'advert_type_desc';

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
    public static function create(array $array)
    {
        return self::query()->create($array);
    }
    public function advertType() {
        return $this->belongsTo(AdvertType::class);
    }
}
