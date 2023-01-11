<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Transfert extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'company_id',
        'from_department_id',
        'to_department_id',
        'user_id',
        'transfer_date',
    ];

    public function company(): HasOne
    {
        return $this->hasOne(Company::class, 'id', 'company_id');
    }

    public function from_department(): HasOne
    {
        return $this->hasOne(Department::class, 'id', 'from_department_id');
    }

    public function to_department(): HasOne
    {
        return $this->hasOne(Department::class, 'id', 'to_department_id');
    }

    public function employee(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
