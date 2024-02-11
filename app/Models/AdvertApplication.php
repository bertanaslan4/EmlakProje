<?php

namespace App\Models;

use App\Enums\ApplicationStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'advert_id',
        'user_id',
        'document_comments',
        'status',
        'rejection_reason',
    ];

    protected $casts = [
        'status' => ApplicationStatus::class,
    ];

    public function advert()
    {
        return $this->belongsTo(Advert::class, 'advert_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
