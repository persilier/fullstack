<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Division;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city = City::factory()->count(10);
       User::factory()
            ->count(1)
            ->has(UserProfile::factory(1))
            ->create()
            ->each(fn($user) => $user->assignRole('superAdmin'));
       User::factory()
            ->count(2)
            ->has(UserProfile::factory(1))
            ->create()
            ->each(fn($user) => $user->assignRole('admin'));
        User::factory()
            ->count(10)
            ->has(UserProfile::factory(1))
            ->create()
            ->each(fn($user) => $user->assignRole('manager'));
        User::factory()
            ->count(2)
            ->has(UserProfile::factory(1))
            ->create()
            ->each(fn($user) => $user->assignRole('rh'));
        User::factory()
            ->count(20)
            ->has(UserProfile::factory(1))
            ->create()
            ->each(fn($user) => $user->assignRole('employee'));
        User::factory()
            ->count(1)
            ->has(UserProfile::factory(1))
            ->create()
            ->each(fn($user) => $user->assignRole('auditor'));

    }
}
