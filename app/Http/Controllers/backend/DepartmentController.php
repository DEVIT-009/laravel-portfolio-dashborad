<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use App\Services\DepartmentService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DepartmentController extends Controller
{
    public function __construct(
        protected DepartmentService $departmentService
    ) {}

    /**
     * List departments
     */
    public function index(): View
    {
        return view('backend.index', [
            'content'     => 'backend.contents.departments.index',
            'pageTitle'   => 'Department List',
            'departments' => $this->departmentService->list(),
        ]);
    }

    /**
     * Show create form
     */
    public function create(): View
    {
        return view('backend.index', [
            'content'   => 'backend.contents.departments.create',
            'pageTitle' => 'Create Department',
        ]);
    }

    /**
     * Show detail
     */
    public function show(Department $department): View
    {
        return view('backend.index', [
            'content'    => 'backend.contents.departments.show',
            'pageTitle'  => 'Department Detail',
            'department' => $department,
        ]);
    }

    /**
     * Show edit form
     */
    public function edit(Department $department): View
    {
        return view('backend.index', [
            'content'    => 'backend.contents.departments.edit',
            'pageTitle'  => 'Update Department',
            'department' => $department,
        ]);
    }

    /**
     * Store department
     * @throws \Throwable
     */

    public function store(DepartmentRequest $request)
    {
        $this->departmentService->create($request->validated());

        if ($request->input('action') === 'create') {
            return redirect()
                ->back()
                ->with('success', 'Department created successfully');
        }

        return redirect()
            ->route('backend.department.index')
            ->with('success', 'Department created successfully');
    }


    /**
     * Update department
     * @throws \Throwable
     */
    public function update(
        DepartmentRequest $request,
        Department $department
    ) {
        $this->departmentService->update(
            $department,
            $request->validated()
        );

        if ($request->input('action') === 'save') {
            return back()->with('success', 'Department updated successfully');
        }

        return redirect()
            ->route('backend.department.index')
            ->with('success', 'Department updated successfully');
    }


    /**
     * Delete department
     * @throws \Throwable
     */
    public function destroy(Department $department)
    {
        $this->departmentService->delete($department);

        return redirect()
            ->back()
            ->with('success', 'Department deleted successfully');
    }
}
