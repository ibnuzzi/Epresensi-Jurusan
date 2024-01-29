<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Requests\ClassroomRequest;
use App\Contracts\Interfaces\ClassroomInterface;

class ClassroomController extends Controller
{
    private ClassroomInterface $classroom;

    public function __construct(ClassroomInterface $classroom)
    {
        $this->classroom = $classroom;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classrooms = $this->classroom->get();
        return view('admin.classroom', compact('classrooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClassroomRequest $request)
    {
        $this->classroom->store($request->validated());
        return redirect()->back()->with('success', trans('alert.add_success'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Classroom $classroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classroom $classroom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClassroomRequest $request, Classroom $classroom)
    {
        $this->classroom->update($classroom->id, $request->validated());
        return redirect()->back()->with('success', trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom $classroom)
    {
        $this->classroom->delete($classroom->id);
        return redirect()->back()->with('success', trans('alert.delete_success'));
    }
}
