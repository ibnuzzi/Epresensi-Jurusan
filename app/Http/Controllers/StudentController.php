<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\ClassroomInterface;

class StudentController extends Controller
{

    private StudentInterface $student;
    private ClassroomInterface $classroom;

    public function __construct(StudentInterface $student, ClassroomInterface $classroom)
    {
        $this->student = $student;
        $this->classroom = $classroom;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classrooms = $this->classroom->get();
        $students = $this->student->get();
        return view('admin.student', compact('students', 'classrooms'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
