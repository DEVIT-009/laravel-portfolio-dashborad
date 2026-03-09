<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the requests
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'full_name' => ['required', 'string', 'max:255'],

            'gender' => ['required', 'in:male,female,other'],

            'code' => ['required', 'string', 'max:50', 'unique:employees,code'],

            'dob' => ['required', 'date'],

            'national_id' => ['required', 'string', 'max:255', 'unique:employees,national_id'],

            'email' => ['required', 'email', 'max:255', 'unique:employees,email'],

            'phone_number' => ['nullable', 'string', 'max:20'],

            'address' => ['nullable', 'string'],

            'hire_date' => ['required', 'date'],

            'employee_type' => ['required', 'in:full_time,part_time,contract'],

            'status' => ['required', 'in:active,inactive,terminated'],

            'profile' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],

            'department_id' => ['required', 'exists:departments,id'],

            'position_id' => ['required', 'exists:positions,id'],

        ];
    }

}
