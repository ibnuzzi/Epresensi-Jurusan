<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttendancePermissionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'file' => 'required|mimes:jpg,png,jpeg',
            'status' => 'required',
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
            'file.required' => 'Kolom file wajib diisi.',
            'file.mimes' => 'Tipe file yang diizinkan adalah jpg, png, atau jpeg.',
            'status.required' => 'Kolom status wajib diisi.',
        ];
    }
}
