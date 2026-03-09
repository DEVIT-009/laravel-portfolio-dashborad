<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected static function booted(): void
    {
        static::creating(function ($model) {
            $model->created_by = optional(auth()->user())->name ?? 'system';
        });

        static::updating(function ($model) {
            $model->updated_by = optional(auth()->user())->name ?? 'system';
        });

        static::deleting(function ($model) {
            $model->deleted_by = optional(auth()->user())->name ?? 'system';
            $model->save();
        });
    }

}
