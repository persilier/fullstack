<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LeaveType extends Model
{
    use HasFactory;
    protected $fillable=[
        'code',
        'name',
        'description',
        'earned_leave',
        'carry_forward',
        'number_days',
        'max',
        'status',
        'applicable'
    ];

    public function customLeavePolicy(): HasMany
    {
        return $this->hasMany(CustomLeavePolicy::class);
    }



}
