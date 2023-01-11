<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Country;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Division;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravolt\Avatar\Avatar;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $first_name=fake()->firstName();
        $last_name=fake()->lastName();
        $email=fake()->unique()->safeEmail();
        $country_id = Country::all()->random()->id;
        $department_id = Department::all()->random()->id;
        $designation_id = Designation::all()->random()->id;
        $city_id = City::all()->random()->id;
        //$division_id = Division::all()->random()->id;
        //$supervisor = User::role('manager')->get()->random()->id;

        return [
            'first_name' =>$first_name ,
            'last_name' => $last_name,
            'email' => $email,
            'phone' =>fake()->phoneNumber(),
            'country_id' =>$country_id,
            'designation_id' =>$designation_id,
            'department_id' =>$department_id,
            'city_id' =>$city_id,
            'company_id' =>1,
            //'division_id' =>1,
            //'supervisor_id' =>$supervisor,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
