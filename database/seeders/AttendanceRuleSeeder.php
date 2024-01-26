<?php

namespace Database\Seeders;

use App\Models\AttendanceRule;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AttendanceRuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday'];

    foreach ($days as $day) {
        AttendanceRule::query()->create([
            'day' => $day,
            'checkin_starts' => '07:00',
            'checkin_ends' => '07:30',
            'checkout_starts' => '15:00',
            'checkout_ends' => '16:00',
        ]);
    }
}

}
