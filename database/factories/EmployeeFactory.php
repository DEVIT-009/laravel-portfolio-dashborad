<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    public function definition(): array
    {
        return [
            'full_name' => $this->faker->name(),
            'gender' => $this->faker->randomElement(['male', 'female', 'other']),
            'dob' => $this->faker->date('Y-m-d', '-18 years'),
            'national_id' => $this->faker->unique()->numerify('NID#######'),
            'email' => $this->faker->unique()->safeEmail(),
            'phone_number' => $this->faker->optional()->phoneNumber(),
            'address' => $this->faker->optional()->address(),
            'hire_date' => $this->faker->date(),
            'employee_type' => $this->faker->randomElement(['full_time', 'part_time', 'contract']),
            'status' => $this->faker->randomElement(['active', 'inactive', 'terminated']),
            'profile' => null,

            // Foreign keys (IMPORTANT)
            'department_id' => Department::factory(),
            'position_id' => Position::factory(),
        ];
    }
}
