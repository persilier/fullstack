<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Designation extends Model
{
    use HasFactory;
    protected $fillable=[
        'designation',
        'description',
        'department_id'
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function department(): BelongsTo
    {
       return $this->belongsTo(Department::class);
    }
}
