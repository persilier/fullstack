<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class StrategicalGoal extends Model
{
    use HasFactory;
    protected $fillable=[
        'code',
        'description',
        'start_year',
        'end_year',
        'company_id',
        'weight',
        'responsible',
        'status',
    ];

    public function strategicalIndicator(): HasMany
    {
        return $this->hasMany(StrategicalIndicator::class);
    }

    public function responsible(): HasOne
    {
       return $this->hasOne(User::class,'id','responsible');
    }

    public function tacticalGoals(): HasMany
    {
        return $this->hasMany(TacticalGoal::class);
    }
}
