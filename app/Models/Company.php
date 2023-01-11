<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Company extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;
    protected $fillable=[
        'name',
        'type',
        'trading_name',
        'registration_no',
        'ifu',
        'contact_no',
        'email',
        'website',
        'tax_no',
        'company_logo',
        'is_active',
    ];

    public function policy(): HasMany
    {
        return $this->hasMany(PolicyCompany::class);
    }
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function awards(): HasMany
    {
        return $this->hasMany(Award::class);
    }

    public function divisions(): HasMany
    {
        return $this->hasMany(Division::class);
    }
    public function announces(): HasMany
    {
        return $this->hasMany(Announcement::class);
    }
    public function registerMediaCollections():void
    {
        $this->addMediaCollection('logo')
            ->singleFile();

    }

    public function strategicGoal(): HasMany
    {
        return $this->hasMany(StrategicalGoal::class);

    }
}
