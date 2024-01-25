<?php

use App\Enums\DayEnum;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('attendance_rules', function (Blueprint $table) {
            $table->id();
            $table->enum('day', [DayEnum::SUNDAY->value, DayEnum::MONDAY->value, DayEnum::TUESDAY->value, DayEnum::WEDNESDAY->value, DayEnum::THURSDAY->value, DayEnum::FRIDAY->value , DayEnum::SATURDAY->value]);
            $table->time('checkin_starts');
            $table->time('checkin_ends');
            $table->time('checkout_starts');
            $table->time('checkout_ends');
            $table->unique('day');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance_rules');
    }
};
