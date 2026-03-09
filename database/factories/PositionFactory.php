<?php

namespace Database\Factories;

use App\Models\Position;
use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

class PositionFactory extends Factory
{
    protected $model = Position::class;

    public function definition(): array
    {
        return [
            'position_title' => $this->faker->jobTitle(),
            'description' => $this->faker->sentence(),
            'level' => $this->faker->randomElement(['Junior', 'Mid', 'Senior']),
            'department_id' => Department::factory(),
            'is_managerial' => $this->faker->boolean(),
        ];
    }
}
