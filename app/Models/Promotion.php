<?php

namespace App\Models;

use Abdrzakoxa\EloquentFilter\Filters\BetweenFilter;
use Abdrzakoxa\EloquentFilter\Traits\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

class Promotion extends Model
{
    use HasFactory,Filterable;

    protected $filters =[
        BetweenFilter::class
    ];
    protected $fillable = [
        'user_id',
        'company_id',
        'promotion_title',
        'description',
        'promotion_date',
    ];

    public function company(): HasOne
    {
        return $this->hasOne(Company::class, 'id', 'company_id');
    }

    public function employee(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function scopeStartsBefore(Builder $query, $date): Builder
    {
        return $query->where('promotion_date', '<=', Carbon::parse($date));
    }
    public function scopeEndsAfter(Builder $query, $date): Builder
    {
        return $query->where('promotion_date', '>=', Carbon::parse($date));
    }



}
