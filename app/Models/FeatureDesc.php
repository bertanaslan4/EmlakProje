<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureDesc extends Model
{
    use HasFactory;
    protected $table = 'feature_desc';

    protected $fillable = [
        'id',
        'feature_id',
        'lang_id',
        'name',
        'created_at',
        'updated_at',
    ];

    public function feature() {
        return $this->belongsTo(Feature::class);
    }
}
