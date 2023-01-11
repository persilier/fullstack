<?php

namespace App\Models;


use Abdrzakoxa\EloquentFilter\Traits\Filterable;
use App\EloquentFilters\users\DesignationFilter;
use App\EloquentFilters\users\EmployeeFilter;
use App\EloquentFilters\users\RolesFilter;
use Eloquent;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\PersonalAccessToken;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Yungts97\LaravelUserActivityLog\Traits\Loggable;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string|null $avatar
 * @property string|null $phone
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read int|null $actions_count
 * @property-read int|null $activities_count
 * @property-read MediaCollection|Media[] $media
 * @property-read int|null $media_count
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection|Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read Collection|Role[] $roles
 * @property-read int|null $roles_count
 * @property-read Collection|PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @property-read UserProfile|null $userProfile
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin Eloquent
 */
class User extends Authenticatable implements MustVerifyEmail, HasMedia
{
    use HasApiTokens,HasRoles,
        HasFactory, Notifiable,
        TwoFactorAuthenticatable,
        InteractsWithMedia,Loggable,Filterable;

    protected $filters =[
        EmployeeFilter::class,
        DesignationFilter::class,
        RolesFilter::class
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'avatar',
        'phone',
        'email',
        'password',
        'supervisor_id',
        'department_id',
        'country_id',
        'city_id',
        'company_id',
        'division_id',
        'designation_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function userProfile(): HasOne
    {
        return $this->hasOne(UserProfile::class,'user_id');
    }
    public function customLeavePolicy(): HasOne
    {
        return $this->hasOne(CustomLeavePolicy::class);
    }
    public function experiences(): HasMany
    {
        return $this->hasMany(Experience::class);
    }
    public function announcements(): HasMany
    {
        return $this->hasMany(Announcement::class);
    }

    public function events(): HasMany
    {
        return $this->hasMany(EventCalendar::class);
    }
    public function diplomas():HasMany
    {
        return $this->hasMany(Diploma::class);
    }
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
    public function designation(): BelongsTo
    {
        return $this->belongsTo(Designation::class);
    }
    public function docs(): HasMany
    {
        return $this->hasMany(Profile_Doc::class);
    }
    public function training(): BelongsTo
    {
        return $this->belongsTo(Training::class);
    }
    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class);
    }
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function team(): BelongsTo
    {
       return $this->belongsTo(Team::class);
    }
    public function supervisor(): BelongsTo
    {
        return $this->belongsTo(__CLASS__,'supervisor_id','id');
    }
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }


    public function scopeRelations(Builder $query): Builder
    {
        return $query->with([
            'roles.permissions',
            'permissions',
            'department',
            'designation',
            'country',
            'company',
            'city',
            'diplomas',
            'experiences',
            'supervisor',
            'docs',
            'division'
        ]);
    }




    public function registerMediaCollections():void
    {
        $this->addMediaCollection('avatar')
            ->singleFile();

    }
    public function fullName(): Attribute
    {
        return Attribute::make(
            get:fn($value,$attributes)=> $attributes['first_name']." ".$attributes['last_name'],

        );
    }

}
