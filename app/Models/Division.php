<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Division extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'telephone',
        'company_id',
        'country_id',
        'city_id',
        'location_manager',
    ];
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
    public function manager(): HasOne
    {
        return $this->hasOne(User::class,'id');
    }
    public function country(): HasOne
    {
        return $this->hasOne(Country::class,'id');
    }
    public function city(): HasOne
    {
        return $this->hasOne(City::class,'id');
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class,'id');
    }
}
