<?php

use App\Enums\AttendanceStatusEnum;
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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('date');
            $table->enum('status',[AttendanceStatusEnum::ALPHA->value,AttendanceStatusEnum::PERMISSION->value,AttendanceStatusEnum::PRESENT->value,AttendanceStatusEnum::SICK->value]);
            $table->text('license')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
