<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacilityDesc extends Model
{
    use HasFactory;
    protected $table = 'facility_desc';

    protected $fillable = [
        'id',
        'facility_id',
        'lang_id',
        'name',
        'created_at',
        'updated_at',
    ];

    public function facility() {
        return $this->belongsTo(Facility::class);
    }

}
