<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\AttendanceRuleInterface;
use App\Contracts\Interfaces\ClassroomInterface;
use App\Helpers\ResponseHelper;
use App\Http\Resources\PresenceResource;
use App\Models\Attendance;
use App\Services\AttendanceService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    private AttendanceInterface $attendance;
    private AttendanceRuleInterface $attendanceRule;
    private ClassroomInterface $classroom;

    public function __construct(AttendanceInterface $attendance, AttendanceService $service, AttendanceRuleInterface $attendanceRule, ClassroomInterface $classroom)
    {
        $this->attendance = $attendance;
        $this->service = $service;
        $this->attendanceRule = $attendanceRule;
        $this->classroom = $classroom;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $students = $this->attendance->search($request);
        $data = $this->service->sortBy($students);
        return ResponseHelper::success(PresenceResource::collection($data));
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
        $latitudeKantor = -7.8915833;
        $longitudeKantor = 112.6079333;
        $location = $request->location;
        $locationUser = explode(",", $location);
        $latitudeUser = $locationUser[0];
        $longitudeUser = $locationUser[1];

        $jarak = $this->distance($latitudeKantor, $longitudeKantor, $latitudeUser, $longitudeUser);
        $radius = round($jarak['meters']);

        if ($radius > 10) {
            return ResponseHelper::error(null, trans('Maaf Anda Berada Diluar Radius, Jarak Anda ' . $radius . ' meter dari sekolah'));
        }

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

    public function studentAttendance()
    {
        $attendance = $this->attendance->get();
        $classrooms = $this->classroom->get();
        return view('admin.attendance', compact('attendance', 'classrooms'));
    }
}
