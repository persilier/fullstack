<?php

namespace App\Models;

use App\Enums\v1\Travel\TravelModeEnum;
use App\Enums\v1\Travel\TravelStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Travel extends Model
{
    use HasFactory;
    protected $table = 'travel';
    protected $fillable = [
        'description',
        'travel_type',
        'status',
        'company_id',
        'travel_mode',
        'user_id',
        'start_date',
        'end_date',
        'purpose_of_visit',
        'place_of_visit',
        'expected_budget',
        'actual_budget',
    ];
    public $casts = [
        'status' => TravelStatusEnum::class,
        'travel_mode' => TravelModeEnum::class,
    ];
    public function company(): HasOne
    {
        return $this->hasOne(Company::class, 'id', 'company_id');
    }

    public function travelType(): HasOne
    {
        return $this->hasOne(TravelType::class, 'id', 'travel_type');
    }

    public function employee(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
