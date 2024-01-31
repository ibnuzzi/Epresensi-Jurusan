<?php

namespace App\Contracts\Repositories;

use App\Models\Attendance;
use App\Contracts\Repositories\BaseRepository;
use App\Contracts\Interfaces\AttendanceInterface;

class AttendanceRepository extends BaseRepository implements AttendanceInterface
{

     /**
     * __construct
     *
     * @param  mixed $model
     * @return void
     */
    public function __construct(Attendance $model)
    {
        $this->model = $model;
    }

    /**
     * store
     *
     * @param  mixed $data
     * @return mixed
     */
    public function store(array $data): mixed
    {
        $attendance = $this->model->query()
            ->updateOrCreate([
                'user_id' => $data['user_id'],
                'date' => $data['date']
            ], $data);

        $attendance->attendanceDetails()->create($data);

        return $attendance;
    }

    /**
     * checkPrecense
     *
     * @param  string $userId
     * @param  string $type
     * @param  mixed $date
     * @return mixed
     */
    public function checkPrecense(string $userId, string $type,mixed $date): mixed
    {
        return $this->model->query()
            ->where('user_id', $userId)
            ->whereDate('date',$date)
            ->whereRelation('attendanceDetails', 'type', $type)
            ->first();
    }

}
