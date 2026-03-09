<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [
        'code',
        'full_name',
        'gender',
        'dob',
        'national_id',
        'email',
        'phone_number',
        'address',
        'hire_date',
        'employee_type',
        'status',
        'profile',
        'department_id',
        'position_id',
    ];

    protected $casts = [
        'dob' => 'date',
        'hire_date' => 'date',
    ];

    /**
     * Employee belongs to a Department
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Employee belongs to a Position
     */
    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
