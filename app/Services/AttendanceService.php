<?php

namespace App\Services;

use App\Http\Requests\AttendanceRequest;

class AttendanceService
{

    /**
     * store
     *
     * @param  mixed $request
     * @return mixed
     */
    public function store(AttendanceRequest $request): mixed
    {
        $data = [
            'read_at' => null,
            'user_id' => $student->user_id,
            'date' => Carbon::parse($time)->format('Y:m:d'),
            'type' => $type,
            'status' => 'present',
            'created_at' => $time
        ];
    }
}
