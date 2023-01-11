<?php

use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Api\v1\AnnouncementController;
use App\Http\Controllers\Api\v1\AwardController;
use App\Http\Controllers\Api\v1\AwardTypeController;
use App\Http\Controllers\Api\v1\CityController;
use App\Http\Controllers\Api\v1\CompanyController;
use App\Http\Controllers\Api\v1\ComplaintController;
use App\Http\Controllers\Api\v1\CountryController;
use App\Http\Controllers\Api\v1\CustomLeavePolicyController;
use App\Http\Controllers\Api\v1\DepartmentController;
use App\Http\Controllers\Api\v1\DesignationController;
use App\Http\Controllers\Api\v1\DiplomaController;
use App\Http\Controllers\Api\v1\DivisionController;
use App\Http\Controllers\Api\v1\EventCalendarController;
use App\Http\Controllers\Api\v1\ExperienceController;
use App\Http\Controllers\Api\v1\LeaveTypeController;
use App\Http\Controllers\Api\v1\PermissionController;
use App\Http\Controllers\Api\v1\PolicyCompanyController;
use App\Http\Controllers\Api\v1\ProfileDocController;
use App\Http\Controllers\Api\v1\PromotionController;
use App\Http\Controllers\Api\v1\ResignationController;
use App\Http\Controllers\Api\v1\RoleController;
use App\Http\Controllers\Api\v1\StrategicalGoalController;
use App\Http\Controllers\Api\v1\StrategicalIndicatorController;
use App\Http\Controllers\Api\v1\TacticalGoalController;
use App\Http\Controllers\Api\v1\TacticalIndicatorController;
use App\Http\Controllers\Api\v1\TeamController;
use App\Http\Controllers\Api\v1\TeamMemberController;
use App\Http\Controllers\Api\v1\TerminationController;
use App\Http\Controllers\Api\v1\TerminationTypeController;
use App\Http\Controllers\Api\v1\TrainerController;
use App\Http\Controllers\Api\v1\TrainingController;
use App\Http\Controllers\Api\v1\TrainingListController;
use App\Http\Controllers\Api\v1\TransfertController;
use App\Http\Controllers\Api\v1\TravelController;
use App\Http\Controllers\Api\v1\TravelTypeController;
use App\Http\Controllers\Api\v1\UserController;
use App\Http\Controllers\Api\v1\WarningController;
use App\Http\Controllers\Api\v1\WarningTypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->group(function(){


    Route::get('/me',[UserController::class,'me']);
    Route::apiResource('/cities',CityController::class);
    Route::get('/cities-list',[CityController::class,'listCities']);
    Route::apiResource('/departments',DepartmentController::class);
    Route::get('/departments-list', [DepartmentController::class,'listDepartments']);
    Route::apiResource('/countries',CountryController::class);
    Route::get('/countries-list', [CountryController::class,'listCountries']);
    Route::apiResource('/designations',DesignationController::class);
    Route::get('/designations-list', [DesignationController::class,'listDesignations']);
    Route::apiResource('/divisions',DivisionController::class);
    Route::apiResource('/companies',CompanyController::class);
    Route::apiResource('/policies-company',PolicyCompanyController::class);
    Route::apiResource('/promotions',PromotionController::class);
    Route::apiResource('/awards', AwardController::class);
    Route::apiResource('/award-types', AwardTypeController::class);
    Route::apiResource('/travel-types', TravelTypeController::class);
    Route::apiResource('/travels',TravelController::class);
    Route::apiResource('/user-documents',ProfileDocController::class);
    Route::get('/user-documents/downloads/{id}', [ProfileDocController::class,'download']);
    Route::apiResource('/resignations', ResignationController::class);
    Route::apiResource('/terminations', TerminationController::class);
    Route::apiResource('/termination-types', TerminationTypeController::class);
    Route::apiResource('/transfers',TransfertController::class);
    Route::apiResource('/complaints',ComplaintController::class);
    Route::apiResource('/leave-types',LeaveTypeController::class);
    Route::apiResource('/user-experiences',ExperienceController::class);
    Route::apiResource('/warning-types', WarningTypeController::class);
    Route::apiResource('/warnings', WarningController::class);
    Route::apiResource('/events',EventCalendarController::class);
    Route::apiResource('/departments/teams',TeamController::class);
    Route::apiResource('/strategical-goals',StrategicalGoalController::class);
    Route::get('/strategical-goals-list',[StrategicalGoalController::class,'listAll']);
    Route::apiResource('/strategical-indicators',StrategicalIndicatorController::class);
    Route::apiResource('/tactical-goals',TacticalGoalController::class);
    Route::get('/tactical-goals-list',[TacticalGoalController::class,'listAll']);
    Route::apiResource('/tactical-indicators',TacticalIndicatorController::class);
    Route::apiResource('/departments/team-members',TeamMemberController::class);
    Route::apiResource('/trainers', TrainerController::class);
    Route::apiResource('/user-diplomas',DiplomaController::class);
    Route::apiResource('/leave-types/custom-policy',CustomLeavePolicyController::class);
    Route::get('/user-diplomas/downloads/{id}', [DiplomaController::class,'download']);
    Route::apiResource('/training-lists', TrainingListController::class);
    Route::apiResource('/trainings', TrainingController::class);
    Route::get('/trainers-list', [TrainerController::class,'listTrainers']);
    Route::apiResource('/announcements', AnnouncementController::class);


    //ADMIN ROUTES
    Route::group(['middleware'=>'role:superAdmin','prefix'=>'admin'], function (){

        //User Resources
        Route::apiResource('/users/admin-control',AdminUserController::class);
        Route::post('/users/admin-control/suspend/{user}',[AdminUserController::class,'suspend']);
        Route::post('/users/admin-control/activate/{user}',[AdminUserController::class,'activate']);
        Route::get('/users/list',[UserController::class,'listAllUsers']);
        Route::get('/activities-log',[AdminUserController::class,'getAllActivities']);
        Route::get('/users',[UserController::class,'index']);
        Route::post('/users/create',[UserController::class,'createUser']);
        Route::get('/users/manager',[UserController::class,'listAllManager']);
        Route::delete('/users/{user}',[UserController::class,'deleteUser']);
        Route::put('/users/{user}',[UserController::class,'updateUser']);
        Route::get('/users/{user}',[UserController::class,'getOneUser']);
        Route::post('/users/{user}/roles',[UserController::class,'assignRole']);
        Route::delete('/users/{user}/roles/{role}',[UserController::class,'removeRole']);
        Route::post('/users/{user}/permissions',[UserController::class,'givePermission']);
        Route::delete('/users/{user}/permissions/{permission}',[UserController::class,'revokePermission']);

        // Roles Resources
        Route::apiResource('/roles',RoleController::class);
        Route::post('/roles/{role}/permissions',[RoleController::class,'givePermission']);
        Route::delete('/roles/{role}/permissions/{permission}',[RoleController::class,'revokePermission']);

        //Permissions Resources
        Route::apiResource('/permissions',PermissionController::class);
        Route::post('/permissions/{permission}/roles',[PermissionController::class,'assignRole']);
        Route::post('/permissions/{permission}/roles/{role}',[PermissionController::class,'removeRole']);
    });

});

