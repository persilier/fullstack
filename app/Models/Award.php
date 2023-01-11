<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Award extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;
    protected $fillable = [
        'award_information',
        'gift',
        'cash',
        'company_id',
        'department_id',
        'user_id',
        'award_date',
        'award_type_id',
        'award_photo',
    ];

    public function company(): HasOne
    {
        return $this->hasOne(Company::class, 'id', 'company_id');
    }

    public function department(): HasOne
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }

    public function employee(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function awardType(): HasOne
    {
        return $this->hasOne(AwardType::class, 'id', 'award_type_id');
    }

    public function scopeRelations(Builder $query): Builder
    {
        return $query->with(['employee','employee.roles',
            'employee.supervisor','employee.designation'
            ,'company','department','awardType'
        ]);
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
