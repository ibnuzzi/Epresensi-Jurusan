<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Http\Requests\AttendancePermissionRequest;
use App\Services\AttendanceService;

class PermissionController extends Controller
{
    private AttendanceInterface $attendance;
    private AttendanceService $attendanceService;

    public function __construct(AttendanceInterface $attendance, AttendanceService $attendanceService)
    {
        $this->attendance = $attendance;
        $this->attendanceService = $attendanceService;
    }

    public function index()
    {
        return view('student.permission');
    }

    public function store(AttendancePermissionRequest $request, $user)
    {
        $this->attendance->storePermission($this->attendanceService->storePermission($request, $user));
        return redirect()->back()->with('success', trans('alert.add_success'));
    }
}
