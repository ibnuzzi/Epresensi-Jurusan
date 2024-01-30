<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Services\AttendanceService;
use App\Http\Requests\AttendanceRequest;
use App\Contracts\Interfaces\AttendanceInterface;

class AttendanceController extends Controller
{
    private AttendanceInterface $attendance;

    public function __construct(AttendanceInterface $attendance, AttendanceService $service)
    {
        $this->attendance = $attendance;
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.attendance');
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
        $now = now();
        $time = Carbon::parse($now);
        $day = $time->format('l');

        //check rules
        $rule = $this->attendanceRule->showByDay($student->school_id, $day);
        if ($rule->is_holiday) return ResponseHelper::error(null, trans('alert.is_holiday'));

        //check attendance session
        $attendanceTime = $this->service->checkAttendanceTime($rule, $now);
        if (!$attendanceTime) return ResponseHelper::error(null, trans('alert.attendance_time_not_found'));

        //check precense
        $presence = $this->attendance->checkPrecense($student->user_id, $attendanceTime,Carbon::parse($now)->format('Y:m:d'));
        if ($presence) return ResponseHelper::error(null, trans('alert.already_presence'));

        $data = $this->service->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
