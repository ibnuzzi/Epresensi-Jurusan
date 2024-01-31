<?php

namespace App\Models;

use App\Models\AttendanceDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendances';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'user_id', 'date', 'status','photo','license','created_at'];
    protected $guarded = [];

    /**
     * Get all of the attendanceDetails for the Attendance
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attendanceDetails(): HasMany
    {
        return $this->hasMany(AttendanceDetail::class,);
    }
}
