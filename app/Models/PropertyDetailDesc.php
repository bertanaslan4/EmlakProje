<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyDetailDesc extends Model
{
    use HasFactory;
    protected $table = 'property_detail_desc';

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
    public static function create(array $array)
    {
        return self::query()->create($array);
    }
    public function propertyDetail() {
        return $this->belongsTo(PropertyDetail::class);
    }
}
