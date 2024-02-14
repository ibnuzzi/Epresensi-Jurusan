<?php

namespace App\Services;

use App\Http\Requests\AttendancePermissionRequest;
use App\Traits\UploadTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AttendanceService
{
    use UploadTrait;

    /**
     * store
     *
     * @param  mixed $request
     * @return mixed
     */
    public function store(mixed $userId, mixed $rule, string $type, mixed $time, Request $request): mixed
    {

        $image = $request->photo;
        $folderPath = "public/absensi/";
        $extension = explode('/', mime_content_type($image))[1];
        $fileName = Str::random(16) . "." . $extension;
        $filePath = $folderPath . $fileName;
        $photo = 'absensi/' . $fileName;

        // Simpan gambar
        Storage::put($filePath, base64_decode(explode(";base64,", $image)[1]));

        $data = [
            'user_id' => $userId,
            'date' => Carbon::parse($time)->format('Y:m:d'),
            'type' => $type,
            'status' => 'present',
            'created_at' => $time,
            'photo' => $photo,
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
        if ($now->between($checkinStarts, $checkinEnds->addMinutes(5))) {
            return 'checkin';
        } else {
            if ($now < $checkinStarts) {
                return false;
            }

            if ($now->between($checkoutStarts, $checkoutEnds->addMinutes(5))) {
                return 'checkout';
            } else {
                return false;
            }
        }
    }

    public function sortBy($data)
    {
        return $data->sortBy(function ($data) {
            return $data->user->name;
        })->values()->all();
    }

    /**
     * store
     *
     * @param  mixed $request
     * @param  mixed $student
     * @return array
     */
    public function storePermission(AttendancePermissionRequest $request, $user): array | bool
    {
        $data = $request->validated();

        $data['file'] = $request->file('file')->store('permission_file', 'public');

        return [
            'user_id' => $user,
            'status' => $data['status'],
            'date' => now(),
            'license' => $data['file'],
        ];
    }
}
