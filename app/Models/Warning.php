<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Warning extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject',
        'description',
        'company_id',
        'warning_to',
        'warning_type',
        'warning_date',
        'status',
    ];

    public function company(): HasOne
    {
        return $this->hasOne(Company::class, 'id', 'company_id');
    }

    public function WarningTo(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'warning_to');
    }

    public function WarningType(): HasOne
    {
        return $this->hasOne(WarningType::class, 'id', 'warning_type');
    }
}
