<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'expired_at' => 'datetime',
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'original_url',
        'short_link',
        'counter',
        'expired_at',
        'max_count'
    ];
}
