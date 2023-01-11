<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TeamMember extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'team_id'
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(User::class,'id');
    }

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}
