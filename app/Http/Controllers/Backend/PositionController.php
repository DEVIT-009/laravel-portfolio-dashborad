<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PositionRequest;
use App\Models\Department;
use App\Models\Position;
use App\Services\PositionService;
use Throwable;

class PositionController extends Controller
{
    public function __construct(
        protected PositionService $positionService
    ){

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.index', [
            'content'     => 'Backend.contents.positions.index',
            'pageTitle'   => 'Position List',
            'positions' => $this->positionService->list(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.index', [
            'content'     => 'Backend.contents.positions.create',
            'pageTitle'   => 'Create Position',
            'departments' => Department::all(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Position $position)
    {
        return view('backend.index', [
            'content'     => 'Backend.contents.positions.show',
            'pageTitle'   => 'Detail Position',
            'position'   => $position,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(position $position)
    {
        return view('backend.index', [
            'content'     => 'Backend.contents.positions.edit',
            'pageTitle'   => 'Edit Position',
            'position'   => $position,
            'departments' => Department::all(),
        ]);
    }


    /**
     * Store a newly created resource in storage.
     * @throws Throwable
     */
    public function store(PositionRequest $request)
    {
        $this->positionService->create($request->validated());

        if ($request->input('action') === 'create') {
            return back()->with('success', 'Position created successfully');
        }
        return redirect()
            ->route('Backend.position.index')
            ->with('success', 'Position created successfully');
    }

    /**
     * Update the specified resource in storage.
     * @throws Throwable
     */
    public function update(PositionRequest $request, Position $position)
    {
        $this->positionService->update(
            $position,
            $request->validated()
        );

        if($request->input('action') === 'save'){
            return back()->with('success', 'Position updated successfully');
        }

        return redirect()
            ->route('Backend.position.index')
            ->with('success', 'Position updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @throws Throwable
     */
    public function destroy(Position $position)
    {
        $this->positionService->distroy($position);

        return back()->with('success', 'Position updated successfully');
    }

    public function getByDepartment($id)
    {
        $positions = Position::where('department_id', $id)
            ->where('status', true)
            ->get();

        return response()->json($positions);
    }
}
