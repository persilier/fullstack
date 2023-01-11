<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class StrategicalIndicator extends Model
{
    use HasFactory;
    protected $fillable=[
        'code',
        'description',
        'start_date',
        'end_date',
        'strategical_goal_id',
        'weight',
        'responsible',
        'status',
        'trust',
        'init_value',
        'target',
        'current_value',
        'progress',
        'comments',
        'next_step'
    ];

    public function strategicalGoal(): BelongsTo
    {
        return $this->belongsTo(StrategicalGoal::class);
    }
    public function responsible(): HasOne
    {
        return $this->hasOne(User::class,'id','responsible');
    }
}
