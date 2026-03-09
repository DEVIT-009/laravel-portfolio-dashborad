<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $table = 'positions';

    protected $fillable = [
        'title',
        'description',
        'level',
        'is_managerial',
        'status',
        'department_id',
    ];

    protected $casts = [
        'is_managerial' => 'boolean',
        'status' => 'boolean',
    ];

    /**
     * A position belongs to a department
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * A position has many employees
     */
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
