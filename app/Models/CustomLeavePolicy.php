<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CustomLeavePolicy extends Model
{
    use HasFactory;
    protected $fillable=['user_id', 'name','num_days','leave_type_id'];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class,'id');
    }

    public function LeaveType(): BelongsTo
    {
        return $this->belongsTo(LeaveType::class);
    }
}
