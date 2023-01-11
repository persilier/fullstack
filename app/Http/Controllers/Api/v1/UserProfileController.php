<?php

namespace App\Http\Controllers\Api\v1;

use App\ApiCode;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserProfileRequest;
use App\Http\Requests\UpdateUserProfileRequest;
use App\Http\Resources\UserProfileResource;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Validator;
use MarcinOrlowski\ResponseBuilder\Exceptions\ArrayWithMixedKeysException;
use MarcinOrlowski\ResponseBuilder\Exceptions\ConfigurationNotFoundException;
use MarcinOrlowski\ResponseBuilder\Exceptions\IncompatibleTypeException;
use MarcinOrlowski\ResponseBuilder\Exceptions\InvalidTypeException;
use MarcinOrlowski\ResponseBuilder\Exceptions\MissingConfigurationKeyException;
use MarcinOrlowski\ResponseBuilder\Exceptions\NotIntegerException;
use Symfony\Component\HttpFoundation\Response;

class UserProfileController extends Controller
{


    public function index()
    {
        $user_id =auth()->user()->id;
        $user=User::relations()->findOrFail($user_id);

        return $this->resourceResponse(new UserProfileResource($user), 'My Profile is available');
    }


    public function store(StoreUserProfileRequest $request): Response
    {
        $validator = Validator::make($request->all(),[
            'firstname'=>'required|string|min:3|max:30',
            'lastname'=>'required|string|min:3|max:30',
            'gender'=>'required|string',
            'address'=>'required|string'
        ]);
        if ($validator->fails()){

            return $this->validationFailedResponse($validator);
        }
        $user = auth()->user();
        if(!$user){
            return $this->notFoundResponse('not found');
        }
        $user->userProfile()->updateOrCreate(['user_id' => $user->id],
            [
                'firstname'=>$request->firstname,
                'lastname'=>$request->lastname,
                'gender'=>$request->gender,
                'address'=>$request->address,
                'active'=>true
            ]
        );

       return $this->successResponse('User profile created successfully');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserProfileRequest $request
     * @param UserProfile $userProfile
     * @return void
     */
    public function update(UpdateUserProfileRequest $request, UserProfile $userProfile)
    {
        //
    }


    public function destroy(): Response
    {
        $user = auth()->user();
        $user->delete();
        auth()->logout();
        return $this->noContentResponse();
    }
}
