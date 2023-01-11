<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TacticalGoal extends Model
{
    use HasFactory;
    protected $fillable=[
        'code',
        'description',
        'start_date',
        'type',
        'end_date',
        'department_id',
        'weight',
        'responsible',
        'strategical_goal_id',
        'status',
    ];

    public function department(): BelongsTo
    {
       return $this->belongsTo(Department::class,'id');
    }

    public function strategicalGoal(): BelongsTo
    {
        return $this->belongsTo(StrategicalGoal::class);
    }

    public function responsible(): HasOne
    {
        return $this->hasOne(User::class,'id');
    }

    public function tacticalIndicators(): HasMany
    {
        return $this->hasMany(TacticalIndicator::class);
    }
    
}
