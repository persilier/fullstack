<?php

namespace App\Models;

use App\Enums\v1\complaint\StatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Complaint extends Model
{
    use HasFactory;
    protected $fillable = [
        'complaint_title',
        'company_id',
        'description',
        'status',
        'complaint_date',
        'complaint_from',
        'complaint_against',
    ];

    public function company(): HasOne
    {
        return $this->hasOne(Company::class, 'id', 'company_id');
    }

    public function complaint_from_employee(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'complaint_from');
    }

    public function complaint_against_employee(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'complaint_against');
    }
}
