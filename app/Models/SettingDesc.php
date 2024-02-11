<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingDesc extends Model
{
    use HasFactory;
    protected $table = 'settings_desc';

    protected $fillable = [
        'setting_id',
        'lang_id',
        'title',
        'keywords',
        'description',
    ];

    public function setting()
    {
        return $this->belongsTo(Setting::class);
    }
}
