<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AttendanceRequest;

class AttendanceService
{

    /**
     * store
     *
     * @param  mixed $request
     * @return mixed
     */
    public function store(mixed $userId, mixed $rule, string $type, mixed $time, Request $request): mixed
    {

        $image = $request->photo;
        $folderPath = "public/uploads/absensi/";
        $formatName = hash(16);
        $image_parts = explode(";base64", $image);
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = $formatName . "png";
        $file = $folderPath . $fileName;
        dd($file);
        Storage::put($file, $image_base64);

        // $photo = Attendance::where('user_id', $userId)->get();
        // if($photo->photo == null){
        //     $data['photo'] = $request->file('photo')->store('attendance_file', 'public');
        // }

        // if ($request->hasFile('photo')) {
        //     Storage::delete('public/' . $photo->photo);
        //     $data['photo'] = $request->file('photo')->store('attendance_file', 'public');
        // }


        $data = [
            'user_id' => $userId,
            'date' => Carbon::parse($time)->format('Y:m:d'),
            'type' => $type,
            'status' => 'present',
            'created_at' => $time,
            'location' => $request->location,
        ];

        if ($type == 'checkin') {
            $data['start_time'] = $rule->checkin_starts;
            $data['end_time'] = $rule->checkin_ends;
        } else if ($type == 'checkout') {
            $data['start_time'] = $rule->checkout_starts;
            $data['end_time'] = $rule->checkout_ends;
        }
        return $data;
    }

    /**
     * checkAttendanceTime
     *
     * @param  mixed $rule
     * @param  mixed $time
     * @return string
     */
    public function checkAttendanceTime(mixed $rule, mixed $time): string | bool
    {
        $checkinStarts = Carbon::createFromFormat('H:i:s', $rule->checkin_starts);
        $checkinEnds = Carbon::createFromFormat('H:i:s', $rule->checkin_ends);
        $checkoutStarts = Carbon::createFromFormat('H:i:s', $rule->checkout_starts);
        $checkoutEnds = Carbon::createFromFormat('H:i:s', $rule->checkout_ends);

        $date = Carbon::parse($time);
        $now = Carbon::createFromFormat('H:i:s', $date->format('H:i:s'));
        if ($now->between($checkinStarts, $checkinEnds->addMinutes(30))) {
            return 'checkin';
        } else {
            if ($now < $checkinStarts) {
                return false;
            }

            if ($rule->early_dismissal) {
                return 'early dismissal';
            }

            if ($now->between($checkoutStarts, $checkoutEnds->addMinutes(30))) {
                return 'checkout';
            } else {
                return false;
            }
        }
    }
}
