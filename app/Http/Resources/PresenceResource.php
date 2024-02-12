<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PresenceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $checkOutEarlydismissal = $this->user->attendance?->attendanceDetails->where('type', 'early dismissal')->first();
        $tabCheckIn = $this->user->attendance?->attendanceDetails->where('type', 'checkin')->first();
        $tabCheckOut = $this->user->attendance?->attendanceDetails->where('type', 'checkout')->first();

        if ($tabCheckIn != null) {
            $check_in = Carbon::parse($tabCheckIn->created_at)->format('H:i');
        } else {
            $check_in = null;
        }


        if ($checkOutEarlydismissal != null) {
            $check_out = Carbon::parse($checkOutEarlydismissal->created_at)->format('H:i');
        } else if ($tabCheckOut != null) {
            $check_out = Carbon::parse($tabCheckOut->created_at)->format('H:i');
        } else {
            $check_out = null;
        }


        if ($tabCheckIn != null) {
            $endTime = Carbon::parse($tabCheckIn->end_time)->format('H:i');
            if ($check_in > $endTime) {
                $status = 'late';
            } else {
                $status =  $this->user->attendance?->status ? $this->user->attendance->status : 'alpha';
            }
        } else {
            $status =  $this->user->attendance?->status ? $this->user->attendance->status : 'alpha';
        }

        return [
            'name' => $this->user->name,
            'photo' => isset($this->user->attendance->photo) ? asset('storage/' . $this->user->attendance->photo) : asset('default.png'),
            'date' => $this->user->attendance?->date,
            'status' => $status,
            'file' => isset($this->user->attendance?->license) ? asset('storage/' . $this->user->attendance?->license) : null,
            'check_in' => $check_in,
            'check_out' => $check_out,
        ];
    }
}
