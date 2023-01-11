<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

class Training extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'trainer_id',
        'training_list_id',
        'start_date',
        'end_date',
        'description',
    ];

    public function employee(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function trainer(): HasOne
    {
        return $this->hasOne(Trainer::class, 'id', 'trainer_id');
    }
    public function skill(): HasOne
    {
        return $this->hasOne(TrainingList::class, 'id', 'training_list_id');
    }
    public function scopeStartsBefore(Builder $query, $date): Builder
    {
        return $query->where('start_date', '<=', Carbon::parse($date));
    }
    public function scopeEndsAfter(Builder $query, $date): Builder
    {
        return $query->where('end_date', '>=', Carbon::parse($date));
    }
}
