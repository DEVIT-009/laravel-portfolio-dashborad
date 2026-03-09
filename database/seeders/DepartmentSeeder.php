<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $departments = [
            [
                'name' => 'Human Resources',
                'description' => 'Handles recruitment and employee welfare',
                'status' => 'active',
                'created_by' => 'system',
            ],
            [
                'name' => 'Finance',
                'description' => 'Manages company finances',
                'status' => 'active',
                'created_by' => 'system',
            ],
            [
                'name' => 'IT',
                'description' => 'Responsible for systems and infrastructure',
                'status' => 'active',
                'created_by' => 'system',
            ],
            [
                'name' => 'Marketing',
                'description' => 'Handles marketing and branding',
                'status' => 'inactive', // example inactive department
                'created_by' => 'system',
            ],
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
