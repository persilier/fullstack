<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;
    protected $fillable=[
        'department',
        'description'
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function designations(): HasMany
    {
        return $this->hasMany(Designation::class);
    }
    public function announces(): HasMany
    {
        return $this->hasMany(Announcement::class);
    }


    public function teams(): HasMany
    {
        return $this->hasMany(Team::class);

    }

    public function tacticalGoals(): HasMany
    {
        return $this->hasMany(TacticalGoal::class);
    }
}
