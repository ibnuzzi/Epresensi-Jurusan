<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Services\AttendanceService;
use App\Http\Requests\AttendanceRequest;
use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\AttendanceRuleInterface;

class AttendanceController extends Controller
{
    private AttendanceInterface $attendance;
    private AttendanceRuleInterface $attendanceRule;

    public function __construct(AttendanceInterface $attendance, AttendanceService $service, AttendanceRuleInterface $attendanceRule)
    {
        $this->attendance = $attendance;
        $this->service = $service;
        $this->attendanceRule = $attendanceRule;
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

        if($day == 'saturday' || $day == 'sunday'){
            return redirect()->back()->with('error', 'Anda tidak bisa melakukan absen karena hari ini libur');
        }
        //check rules
        $rule = $this->attendanceRule->showByDay($day);

        //check attendance session
        $attendanceTime = $this->service->checkAttendanceTime($rule, $now);
        if (!$attendanceTime) return redirect()->back()->with('error', 'Waktu Kehadiran tidak ditemukan');

        //check precense
        $presence = $this->attendance->checkPrecense(auth()->user()->id, $attendanceTime,Carbon::parse($now)->format('Y:m:d'));
        if ($presence) return ResponseHelper::error(null, trans('alert.already_presence'));

        $data = $this->service->store(auth()->user()->id, $rule, $attendanceTime, $now, $request);

        $this->attendance->store($data);

        return redirect()->back()->with('success', 'Berhasil Absen');
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
