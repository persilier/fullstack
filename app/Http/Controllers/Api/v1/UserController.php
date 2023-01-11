<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserProfileResource;
use App\Http\Resources\UserResource;
use App\Models\User;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\QueryBuilder\QueryBuilder;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class UserController extends Controller
{


    public function listAllManager(): Response
    {
        if (!$users =User::role('manager')->relations()->get()) {
            return $this->notFoundResponse('manager not found');
        }
        return $this->resourceCollectionResponse(UserProfileResource::collection($users),'List managers retrieved successfully',true,200);
    }

    public function listAllUsers(Request $request): Response
    {
            $users=User::relations()->latest()->get();

        if(!$users){
            return $this->notFoundResponse('users not found');
        }
        return $this->resourceCollectionResponse(UserProfileResource::collection($users),'all users retrieve successfully', true, 200);
    }


    public function index(Request $request): Response
    {
        $users=QueryBuilder::for(User::class)->relations()->allowedFilters(['last_name',
            'roles.name',
            'designation.designation',
            'department.department'])->latest()->paginate(15);
        if(!$users){
            return $this->notFoundResponse('users not found');
        }
        return $this->resourceCollectionResponse(UserProfileResource::collection($users),'all users list paginate retrieve successfully', true, 200);
    }


    public function me (): Response
    {
        $id=Auth::user()->id;
        $user= User::relations()->findOrFail($id);
        return $this->resourceResponse(new UserProfileResource($user),'my profile information', 200, []);
    }


    public function getOneUser($id): Response
    {
        if(!$user=User::relations()->findOrFail($id)){
           return $this->notFoundResponse('user not found');
        }
        return $this->resourceResponse(new UserProfileResource($user),'user information retrieved successfully', 200, []);

    }

    public function createUser(Request $request): Response
    {
        DB::transaction(function()use($request) {
            $user = User::firstOrCreate(['email' => $request->email], [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone'=>$request->phone,
                'password' => Hash::make($request->password),
                'department_id' =>$request->department_id,
                'designation_id'=>$request->designation_id,
                'country_id'=> $request->country_id,
                'company_id'=> $request->company_id,
                'city_id'=> $request->city_id,
                'division_id'=> $request->division_id,
                'supervisor_id'=> $request->supervisor_id
            ]);
            if ($request->hasFile('avatar')) {
                $user->addMediaFromRequest('avatar')->toMediaCollection('avatar');
            }else {
                $user->addMedia(storage_path('avatar.png'))
                    ->preservingOriginal()
                    ->toMediaCollection('avatar');
            }
            $user->userProfile()->updateOrCreate(['user_id' => $user->id],
                [
                    'employeeID' => IdGenerator::generate([
                        'table' => 'user_profiles',
                        'field' => 'employeeID',
                        'length' => 10,
                        'prefix' => 'EMP-',
                    ]),
                    'gender'=> $request->gender,
                    'date_of_birth'=>$request->date_of_birth,
                    'nationality'=>$request->nationality,
                    'address'=>$request->address,
                    'active'=>true,
                    "phone_two" =>$request->phone_two,
                    "date_hired" =>$request->date_hired,
                    "ifu" =>$request->ifu,
                    "marital_status" =>$request->marital_status,
                    "blood_type" =>$request->blood_type,
                    "emergency_contact" =>$request->emergency_contact,
                    "father_name" =>$request->father_name,
                    "mother_name" =>$request->mother_name,
                    "spouse_name" =>$request->spouse_name,
                    "id_name" =>$request->id_name,
                    "id_number" =>$request->id_number,
                    "num_cnss" =>$request->num_cnss,
                ]
            );

            $user->assignRole('employee');
        });

        return $this->createdResponse('employee created successfully');
    }


    public function updateUser(Request $request, $id): Response
    {
        $user = User::with(['roles'])->findOrFail($id);
        if(!$user) {
            return $this->notFoundResponse('user not found');
        }

        $user = User::updateOrCreate(['id'=>$user->id], [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'department_id' => $request->department_id,
                'designation_id' => $request->designation_id,
                'country_id' => $request->country_id,
                'company_id' => $request->company_id,
                'city_id' => $request->city_id,
                'division_id' => $request->division_id,
                'supervisor_id' => $request->supervisor_id
            ]);
            if ($request->hasFile('avatar')) {
                $user->addMediaFromRequest('avatar')->toMediaCollection('avatar');
            }
            $user->userProfile()->updateOrCreate(['user_id' => $user->id],
                [

                    'gender' => $request->gender,
                    'date_of_birth' => $request->date_of_birth,
                    'nationality' => $request->nationality,
                    'address' => $request->address,
                    'active' => true,
                    "phone_two" => $request->phone_two,
                    "date_hired" => $request->date_hired,
                    "ifu" => $request->ifu,
                    "marital_status" => $request->marital_status,
                    "blood_type" => $request->blood_type,
                    "emergency_contact" => $request->emergency_contact,
                    "father_name" => $request->father_name,
                    "mother_name" => $request->mother_name,
                    "spouse_name" => $request->spouse_name,
                    "id_name" => $request->id_name,
                    "id_number" => $request->id_number,
                    "num_cnss" => $request->num_cnss,
                ]
            );
        return $this->successResponse('Employee updated successfully');
    }

    public function deleteUser(User $user): \Illuminate\Http\Response|Response|Application|ResponseFactory
    {
        if($user->hasRole('superAdmin')){
            return $this->forbiddenResponse('not authorized');
        }
        $user->forceDelete();
        return $this->successResponse('User deleted successfully');
    }


    public function assignRole(Request $request, $id): Response
    {
        $user = User::findOrFail($id);
        if(!$user){
            return $this->notFoundResponse('User not found');
        }
        $user->syncRoles([$request->role]);

        return $this->successResponse('User roles updated successfully');

    }


    public function removeRole($id, Role $role): Response
    {
        $user = User::findOrFail($id);
        if(!$user){
            return $this->notFoundResponse('User not found');
        }
        if($user->hasRole($role)){
            $user->removeRole($role);
        }
        return $this->successResponse('role removed successfully');
    }


    public function givePermission(Request $request, $id): Response
    {
        $user = User::findOrFail($id);
        if(!$user){
            return $this->notFoundResponse('User not found');
        }
        if ($user->hasPermissionTo($request->permission)) {
            return $this->badRequestResponse('already have this Permission ');
        }
        $user->givePermissionTo($request->permission);

        return $this->successResponse('permission given successfully');
    }


    public function revokePermission($id, Permission $permission): Response
    {
        $user = User::findOrFail($id);
        if(!$user){
            return $this->notFoundResponse('User not found');
        }
        if($user->hasPermissionTo($permission)){
            $user->revokePermission($permission);
        }
        return $this->successResponse('permission revoked successfully');


    }
   

}
