<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Profile_Doc extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;
    protected $fillable=['user_id', 'name','description','filePath'];



    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
