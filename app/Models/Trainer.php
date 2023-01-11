<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Trainer extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'picture_url',
        'contact',
        'expertise',
        'address',
    ];
    public function training(): BelongsTo
    {
        return $this->belongsTo(Training::class);
    }
}
