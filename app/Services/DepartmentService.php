<?php

namespace App\Services;

use App\Models\Department;
use Illuminate\Support\Facades\DB;

class DepartmentService
{
    public function list(int $perPage = 10)
    {
        return Department::orderByDesc('id')->paginate($perPage);
    }

    public function listAll()
    {
        return Department::orderByDesc('id')->get();
    }

    /**
     * @throws \Throwable
     */
    public function create(array $data): Department
    {
        return DB::transaction(fn () => Department::create($data));
    }

    /**
     * @throws \Throwable
     */
    public function update(Department $department, array $data): Department
    {
        return DB::transaction(function () use ($department, $data) {
            $department->update($data);
            return $department->fresh();
        });
    }

    /**
     * @throws \Throwable
     */
    public function delete(Department $department): void
    {
        DB::transaction(function () use ($department) {
            $department->delete();
        });
    }
}
