<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\UserProfile
 *
 * @property-read User|null $user
 * @method static \Database\Factories\UserProfileFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile query()
 * @mixin Eloquent
 */
class UserProfile extends Model
{
    use HasFactory;
    protected $fillable =[
        'employeeID','user_id','father_name',
        'mother_name','spouse_name','active',
        'address','nationality','blood_type','id_name',
        'date_of_birth','id_number','phone_two',
        'emergency_contact','gender','marital_status',
        'ifu','date_hired','exit_date','total_leave',
        'remaining_leave','num_cnss'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
