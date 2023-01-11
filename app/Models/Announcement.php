<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Announcement extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'start_date',
        'end_date',
        'summary',
        'description',
        'company_id',
        'department_id',
        'added_by',
        'is_notify',
    ];
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
    public function announcer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id');
    }


}
