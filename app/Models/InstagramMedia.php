<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstagramMedia extends Model
{
    protected $table = 'instagram_media';

    protected $fillable = [
        'instagram_id',
        'media_type',
        'media_url',
        'thumbnail_url',
        'permalink',
        'caption',
        'posted_at',
        'fetched_at',
        'raw_payload',
    ];

    protected $casts = [
        'posted_at' => 'datetime',
        'fetched_at' => 'datetime',
        'raw_payload' => 'array',
    ];
}
