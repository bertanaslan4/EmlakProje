<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    protected $table = 'language';

    protected $fillable = [
        'id',
        'name',
        's_code',
        'is_active',
        'is_default',
        'created_at',
        'updated_at',
    ];

    public function advertDescription(){
        return $this->hasMany(AdvertDesc::class,'lang_id','id');
    }
}
