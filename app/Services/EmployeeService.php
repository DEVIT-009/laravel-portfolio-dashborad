<?php

namespace App\Services;

use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmployeeService
{


    /**
     * Generate unique UUID for employee code
     */
    public function generateEmployeeCode(): string
    {
        do {
            $code = (string) Str::uuid();
        } while (Employee::where('code', $code)->exists());

        return $code;
    }

    public function list(int $perPage = 10)
    {
        return Employee::orderByDesc('id')->paginate($perPage);
    }

    /**
     * @throws \Throwable
     */
    public function create(array $data): Employee
    {
        return DB::transaction(function () use ($data) {
            return Employee::create($data);
        });
    }

    /**
     * @throws \Throwable
     */
    public function update(Employee $employee, array $data): Employee
    {
        return DB::transaction(function () use ($employee, $data) {
            $employee->update($data);
            return $employee->fresh();
        });
    }

    /**
     * @throws \Throwable
     */
    public function delete(Employee $employee): Employee
    {
        return DB::transaction(function () use ($employee) {
            $employee->delete();
        });
    }
}
