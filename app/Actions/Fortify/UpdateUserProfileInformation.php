<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param mixed $user
     * @param array $input
     * @return void
     * @throws ValidationException
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['string', 'max:255'],

            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
        ])->validateWithBag('updateProfileInformation');


        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            if(request()->hasFile('avatar')){
                $user->clearMediaCollection('avatar');
                $user->addMediaFromRequest('avatar')->toMediaCollection('avatar');

            }

            $user->forceFill([
                'first_name' => $input['first_name'],
                'last_name' => $input['last_name'],
                'phone' => $input['phone'],
                'email' => $input['email'],
                'department_id' => $input['department_id'],
                'designation_id' => $input['designation_id'],
                'country_id' => $input['country_id'],
                'city_id' => $input['city_id'],
                'division_id' => $input['division_id'],
                'supervisor_id' => $input['supervisor_id'],
            ])->save();
            $user->userProfile()->updateOrCreate(['user_id' => $user->id],
                [
                    'gender'=> $input['gender'],
                    'date_of_birth'=>$input['date_of_birth'],
                    'nationality'=>$input['nationality'],
                    'address'=>$input['address'],
                    'active'=>true,
                    "phone_two" =>$input['phone_two'],
                    "date_hired" =>$input['date_hired'],
                    "ifu" =>$input['ifu'],
                    "marital_status" =>$input['marital_status'],
                    "blood_type" =>$input['blood_type'],
                    "emergency_contact" =>$input['emergency_contact'],
                    "father_name" =>$input['father_name'],
                    "mother_name" =>$input['mother_name'],
                    "spouse_name" =>$input['spouse_name'],
                    "id_name" =>$input['id_name'],
                    "id_number" =>$input['id_number'],
                    "num_cnss" =>$input['num_cnss'],
                ]
            );
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $url= $user->getFirstMediaUrl();
        $user->forceFill([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'phone' => $input['phone'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
