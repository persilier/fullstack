<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventCalendar extends Model
{
    use HasFactory;
    protected $fillable=['user_id','title','start_date','end_date','days'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
