<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TerminationType extends Model
{
    use HasFactory;
    protected $fillable = ['termination_title'];
}
