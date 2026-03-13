<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
     * @return array<string, ValidationRule|array|string>
     */

    public function rules(): array
    {
        $employeeId = $this->route('employee');

        return [

            'full_name' => ['required','string','max:255'],

            'gender' => ['required', Rule::in(['male','female','other'])],

            'code' => [
                'required','string','max:50',
                Rule::unique('employees','code')->ignore($employeeId)
            ],

            'dob' => ['required','date'],

            'national_id' => [
                'required','string','max:255',
                Rule::unique('employees','national_id')->ignore($employeeId)
            ],

            'email' => [
                'required','email','max:255',
                Rule::unique('employees','email')->ignore($employeeId)
            ],

            'phone_number' => ['nullable','string','max:20'],

            'address' => ['nullable','string'],

            'hire_date' => ['required','date'],

            'employee_type' => ['required', Rule::in(['full_time','part_time','contract'])],

            'status' => ['required', Rule::in(['active','inactive','terminated'])],

            'profile' => ['nullable','image','mimes:jpg,jpeg,png','max:2048'],

            'department_id' => ['required','exists:departments,id'],

            'position_id' => ['required','exists:positions,id'],
        ];
    }
}
