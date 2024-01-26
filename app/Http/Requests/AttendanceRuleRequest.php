<?php

namespace App\Http\Requests;

use App\Rules\DayRule;
use Illuminate\Foundation\Http\FormRequest;

class AttendanceRuleRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'day' => [
                'required',
                new DayRule,
            ],
            'checkin_starts' => 'required|before:checkin_ends',
            'checkin_ends' => 'required',
            'checkout_starts' => 'required|before:checkout_ends',
            'checkout_ends' => 'required',
        ];
    }

    /**
     * Custom Validation Messages
     *
     * @return array<string, mixed>
     */

     public function messages(): array
     {
         return [
             'day.required' => 'Kolom day harus diisi.',
             'checkin_starts.required' => 'Kolom waktu masuk dimulai harus diisi.',
             'checkin_starts.date_format' => 'Format waktu pada kolom waktu masuk dimulai harus HH:MM:SS.',
             'checkin_starts.before' => 'Waktu masuk dimulai harus sebelum waktu masuk berakhir.',
             'checkin_ends.required' => 'Kolom waktu masuk selesai harus diisi.',
             'checkin_ends.date_format' => 'Format waktu pada kolom waktu masuk selesai harus HH:MM:SS.',
             'checkout_starts.required' => 'Kolom waktu pulang dimulai harus diisi.',
             'checkout_starts.date_format' => 'Format waktu pada kolom waktu pulang dimulai harus HH:MM:SS.',
             'checkout_starts.before' => 'Waktu pulang dimulai harus sebelum waktu pulang berakhir.',
             'checkout_ends.required' => 'Kolom waktu pulang berakhir harus diisi.',
             'checkout_ends.date_format' => 'Format waktu pada kolom waktu pulang berakhir harus HH:MM:SS.',
         ];
     }
}
