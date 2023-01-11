<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Termination extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'company_id',
        'terminated_employee',
        'termination_type',
        'termination_date',
        'notice_date',
        'status',
    ];

    public function company(): HasOne
    {
        return $this->hasOne(Company::class, 'id', 'company_id');
    }
    public function employee(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'terminated_employee');
    }
    public function TerminationType(): HasOne
    {
        return $this->hasOne(TerminationType::class, 'id', 'termination_type');
    }
}
