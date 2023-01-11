<?php

namespace Database\Factories;

use App\Models\UserProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<UserProfile>
 */
class UserProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $blood = $this->faker->randomElement([
            'A+',
            'A-',
            'B+',
            'B-',
            'AB+',
            'AB-',
            'O+',
            'O-',
        ]);
        $marital = $this->faker->randomElement([
            'Married',
            'Single',
            'Divorced',
            'Separated',
            'Widowed',
        ]);
        $nationality = $this->faker->randomElement([
            'Congolaise',
            'Béninoise',
            'Gabonaise',
            'Ivoirienne',
            'Senegalaise',
            'Malienne'
        ]);
        $ids = $this->faker->randomElement([
            'NID',
            'Passport',
            'Driving_License',
        ]);
        $startHired = $this->faker->dateTimeBetween(
            'last 4 years',
            'next Friday 3 years');
        return [
            'employeeID' => 'EMP'.$this->faker->numberBetween(20000,40000),
            'father_name'=> $this->faker->name,
            'mother_name'=> $this->faker->name,
            'spouse_name'=> $this->faker->name,
            'active'=> $this->faker->boolean,
            'address'=> $this->faker->address,
            'nationality'=>$nationality,
            'blood_type'=> $blood,
            'id_name'=>$ids,
            'id_number'=>$this->faker->numberBetween(503333, 10222223),
            'date_of_birth'=> $this->faker->dateTimeThisCentury->format('Y-m-d'),
            'phone_two'=>$this->faker->phoneNumber(),
            'emergency_contact'=>$this->faker->phoneNumber(),
            'gender'=> $this->faker->randomElement(['male', 'female']),
            'marital_status'=>$marital,
            'ifu'=> $this->faker->numberBetween(1033339939, 2222223890876),
            'date_hired'=>$startHired,
            'num_cnss'=>$this->faker->numberBetween(103333, 2222223)
        ];
    }
}
