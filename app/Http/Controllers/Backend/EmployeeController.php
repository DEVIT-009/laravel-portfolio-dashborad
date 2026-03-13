<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Services\DepartmentService;
use App\Services\EmployeeService;
use App\Services\PositionService;
use Illuminate\View\View;
use Throwable;

class EmployeeController extends Controller
{
    public function __construct(
        protected EmployeeService $employeeService,
        protected PositionService $positionService,
        protected DepartmentService $departmentService
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('backend.index', [
            'content'     => 'Backend.contents.employees.index',
            'pageTitle'   => 'Employee List',
            'employees' => $this->employeeService->list(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.index', [
            'content'     => 'Backend.contents.employees.create',
            'pageTitle'   => 'Create Employee',
            'departments' => $this->departmentService->listAll(),
            'positions'   => $this->positionService->listAll(),
            'code'        => $this->employeeService->generateEmployeeCode(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('backend.index', [
            'content'     => 'Backend.contents.employees.show',
            'pageTitle'   => 'Employee Details',
            'employee'    => $employee,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('backend.index', [
            'content'     => 'Backend.contents.employees.edit',
            'pageTitle'   => 'Employee Edit',
            'employee'    => $employee,
            'departments' => $this->departmentService->listAll(),
            'positions'   => $this->positionService->listAll(),
            'code'        => $this->employeeService->generateEmployeeCode(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @throws Throwable
     */
    public function store(EmployeeRequest $request)
    {

        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $data['photo'] = $this->employeeService->uploadImage($request->file('photo'));
        }

        $this->employeeService->create($data);

        if($request->input('action') === 'create'){
            return back()->with('success', 'Employee Created Successfully');
        }
        return redirect()
            ->route('Backend.employee.index')
            ->with('success', 'Employee Created Successfully');
    }

    /**
     * Update the specified resource in storage.
     * @throws Throwable
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        $this->employeeService->update($employee, $request->validated());
        echo $request->validated();

        if($request->input('action') === 'save'){
            return back()->with('success', 'Employee Updated Successfully');
        }

        return redirect()
            ->route('Backend.employee.index')
            ->with('success', 'Employee Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @throws Throwable
     */
    public function destroy(Employee $employee)
    {
        $this->employeeService->delete($employee);

        return back()->with('success', 'Employee Deleted Successfully');
    }
}
