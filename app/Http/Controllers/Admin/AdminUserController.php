<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserProfileResource;
use App\Models\User;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\QueryBuilder;
use Throwable;
use Yungts97\LaravelUserActivityLog\Models\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use MarcinOrlowski\ResponseBuilder\Exceptions\ArrayWithMixedKeysException;
use MarcinOrlowski\ResponseBuilder\Exceptions\ConfigurationNotFoundException;
use MarcinOrlowski\ResponseBuilder\Exceptions\IncompatibleTypeException;
use MarcinOrlowski\ResponseBuilder\Exceptions\InvalidTypeException;
use MarcinOrlowski\ResponseBuilder\Exceptions\MissingConfigurationKeyException;
use MarcinOrlowski\ResponseBuilder\Exceptions\NotIntegerException;
use Symfony\Component\HttpFoundation\Response;

class AdminUserController extends Controller
{


    public function index(): \Illuminate\Http\JsonResponse
    {
        if(!$users =QueryBuilder::for(User::class)->relations()->allowedFilters(['last_name','first_name'])->latest()->paginate(15)){
            return $this->notFoundResponse('Users  not found or maybe empty');
        }
        return $this->resourceCollectionResponse(UserProfileResource::collection($users),
            'Users retrieve successfully', true, 200);
    }


    /**
     * @throws Throwable
     */
    public function store(Request $request): Response
    {
        $validator = Validator::make($request->all(),[
            'email' =>'required|email|unique:users,email|max:30',
            'first_name' =>'required|string|min:3|max:30',
            'last_name' =>'required|string|min:3|max:30',
            'phone' =>'required|string',
            'password' => 'required|string|min:6|confirmed',
        ]);
        if ($validator->fails()){
            return $this->validationFailedResponse($validator);
        }
        DB::transaction(function()use($request){
            $user = User::firstOrCreate(['email' => $request->email],[
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone'=>$request->phone,
                'password' => Hash::make($request->password),
            ]);
            if($request->hasFile('avatar')){
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
                    'gender'=>$request->gender,
                    'date_of_birth'=>$request->date_of_birth,
                    'nationality'=>$request->nationality,
                    'address'=>$request->address,
                    'active'=>true
                ]
            );

            $user->assignRole('employee');
        });
        return $this->successResponse('User created successfully');
    }


    public function show($id): Response
    {
        $user = User::relations()->findOrFail($id);
        if(!$user) {
            return $this->notFoundResponse('User not found');
        }
        return $this->resourceResponse(new UserProfileResource($user),'User successfully retrieved',200);

    }


    public function update(Request $request, $id): Response
    {
        $user = User::with(['roles'])->findOrFail($id);
        if(!$user) {
            return $this->notFoundResponse('User not found with id ' . $id);
        }
       /* $validator = Validator::make($request->all(),[
            'email' =>'email|unique:users,email|max:30',
            'first_name' =>'string|min:3|max:30',
            'last_name' =>'string|min:3|max:30',
            'phone' =>'string',
        ]);
        if ($validator->fails()){
            return $this->respondWithError(ApiCode::HTTP_VALIDATION_ERROR,'422');
        }*/
       $user->updateOrCreate(['id'=>$user->id],[
           'first_name' => $request->first_name,
           'last_name' => $request->last_name,
           'email' => $request->email,
           'phone' => $request->phone
       ]);
        if($request->hasFile('avatar')){
            $user->addMediaFromRequest('avatar')->toMediaCollection('avatar');
        }
        $user->userProfile()->updateOrCreate(['user_id' => $user->id],
            [
                'gender'=>$request->gender,
                'date_of_birth'=>$request->date_of_birth,
                'nationality'=>$request->nationality,
                'address'=>$request->address,
            ]
        );
        return $this->successResponse('User updated successfully', null, 200, []);

    }

    public function destroy($id): Response
    {
        $user = User::findOrFail($id);
        if(!$user) {
            return $this->notFoundResponse('User not found with id ' . $id);
        }
        $user->delete();
        return $this->successResponse('User deleted successfully', null, 200, []);
    }

    /**
     * @throws InvalidTypeException
     * @throws NotIntegerException
     * @throws ArrayWithMixedKeysException
     * @throws MissingConfigurationKeyException
     * @throws ConfigurationNotFoundException
     * @throws IncompatibleTypeException
     */
    public function getAllActivities(): Response
    {
        $activities = Log::paginate(15);
        return $this->successResponse('all activities retrieved successfully',$activities, 200, []);
    }



    public function suspend($id): Response
    {
        $user = User::findOrFail($id);
        if(!$user) {
            return $this->notFoundResponse('user not found');
        }
        $user->userProfile()->updateOrCreate(['user_id' => $id],['active' => false,]);
        return $this->successResponse('User has been suspended.!');
    }


    public function activate($id): Response
    {
        $user = User::findOrFail($id);
        if(!$user) {
            return $this->notFoundResponse('user not found');
        }
        $user->userProfile()->updateOrCreate(['user_id' => $id],['active' => true,]);
        return $this->successResponse('User has been activated.!');
    }
}
