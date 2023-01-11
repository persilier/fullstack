<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Resignation extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'company_id',
        'department_id',
        'user_id',
        'resignation_date',
        'notice_date',
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
}
