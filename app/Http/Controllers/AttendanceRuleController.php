<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AttendanceRule;
use App\Http\Requests\AttendanceRuleRequest;
use App\Contracts\Interfaces\AttendanceRuleInterface;

class AttendanceRuleController extends Controller
{
    private AttendanceRuleInterface $attendanceRule;

    public function __construct(AttendanceRuleInterface $attendanceRule)
    {
        $this->attendanceRule = $attendanceRule;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendanceRules = $this->attendanceRule->get();
        return view('admin.clock-settings', compact('attendanceRules'));
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
    public function store(AttendanceRuleRequest $request)
    {
        $this->attendanceRule->store($request->validated());
        return redirect()->back()->with('success');
    }

    /**
     * Display the specified resource
     */
    public function show(AttendanceRule $attendanceRule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AttendanceRule $attendanceRule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AttendanceRule $attendanceRule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AttendanceRule $attendanceRule)
    {
        //
    }
}
