<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertDesc extends Model
{
    use HasFactory;
    protected $table = 'advert_desc';

    protected $fillable = [
        'id',
        'advert_id',
        'title',
        'description',
        'lang_id',
        'sef_link',
        'created_at',
        'updated_at',
    ];

    public function advert() {
        return $this->belongsTo(Advert::class);
    }

}
