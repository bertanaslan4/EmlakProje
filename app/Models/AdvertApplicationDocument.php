<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertApplicationDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'advert_application_id',
        'document',
        'type',
    ];

    public function advertApplication()
    {
        return $this->belongsTo(AdvertApplication::class);
    }
}
