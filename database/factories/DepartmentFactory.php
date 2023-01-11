<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique->randomElement([
            'Comptabilité',
            'Service juridique',
            'Administration',
            'Ressources humaines',
            'Direction generale',
            'Service informatique',
            'Direction exploitation',
            'Service marketing',
            'Service commercial',
            'Direction archivage',
            'Moyens generaux',
            'Audit',
            'Direction developement',
            'Direction du Budget',
            'Contrôle et Qualité',
        ]);
        return [
            'department' => $name,
            'description' => $this->faker->sentence(5),
        ];
    }
}
