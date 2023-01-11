<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = $this->faker->randomElement(['SARL', 'SURL', 'SA']);
        return [
            'name' => $this->faker->company,
            'type' => $type,
            'trading_name' => $this->faker->name,
            'registration_no' => $this->faker->numberBetween(1000, 50000),
            'ifu' => $this->faker->numberBetween(6000, 10000),
            'contact_no' => $this->faker->numberBetween(4000, 80000),
            'email' => $this->faker->email(),
            'website' => $this->faker->domainName,
            'tax_no' => $this->faker->numberBetween(7000, 90000),
            'company_logo' => $this->faker->imageUrl(
                $width = 640,
                $height = 480
            ),
            'is_active' => $this->faker->boolean()
        ];
    }
}
