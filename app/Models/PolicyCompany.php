<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class PolicyCompany extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = ['company_id', 'title', 'description'];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
