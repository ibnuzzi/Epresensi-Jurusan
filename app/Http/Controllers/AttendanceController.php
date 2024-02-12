<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Services\AttendanceService;
use App\Contracts\Interfaces\AttendanceInterface;
use App\Http\Resources\PresenceResource;
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
    public function index(Request $request)
    {
        $students = $this->attendance->search($request);
        return ResponseHelper::success(PresenceResource::collection($students));
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
        $location = $request->location;
        $locationUser = explode(",", $location);

        $now = now();
        $time = Carbon::parse($now);
        $day = $time->format('l');

        if ($day == 'saturday' || $day == 'sunday') {
            return ResponseHelper::error(null, trans('Anda tidak bisa melakukan absen karena hari ini libur'));
        }

        //check rules
        $rule = $this->attendanceRule->showByDay($day);
        //check attendance session
        $attendanceTime = $this->service->checkAttendanceTime($rule, $now);
        if (!$attendanceTime) {
            return ResponseHelper::error(null, trans('Waktu Kehadiran tidak ditemukan'));
        }

        //check precense
        $presence = $this->attendance->checkPrecense(auth()->user()->id, $attendanceTime, Carbon::parse($now)->format('Y:m:d'));
        if ($presence) {
            return ResponseHelper::error(null, trans('Anda sudah melakukan absen hari ini'));
        }

        $data = $this->service->store(auth()->user()->id, $rule, $attendanceTime, $now, $request);

        $this->attendance->store($data);

        return ResponseHelper::success(null, trans('Berhasil Melakukan Absen'));
    }

    //Menghitung Jarak
    public function distance($lat1, $lon1, $lat2, $lon2)
    {
        $theta = $lon1 - $lon2;
        $miles = (sin(deg2rad($lat1)) * sin(deg2rad($lat2))) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));
        $miles = acos($miles);
        $miles = rad2deg($miles);
        $miles = $miles * 60 * 1.1515;
        $feet = $miles * 5280;
        $yards = $feet / 3;
        $kilometers = $miles * 1.609344;
        $meters = $kilometers * 1000;
        return compact('meters');
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
