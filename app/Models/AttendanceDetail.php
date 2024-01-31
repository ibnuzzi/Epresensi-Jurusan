<?php

namespace App\Models;

use App\Models\Attendance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AttendanceDetail extends Model
{
    use HasFactory;

    protected $table = 'attendance_details';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'type', 'start_time', 'end_time','created_at'];
    protected $guarded = [];

    /**
     * Get the attendance that owns the AttendanceDetail
     *
     * @return BelongsTo
     */
    public function attendance(): BelongsTo
    {
        return $this->belongsTo(Attendance::class);
    }
}
