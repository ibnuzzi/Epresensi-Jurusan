<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Repositories\BaseRepository;
use App\Models\Attendance;
use Illuminate\Http\Request;

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
     * Handle the Get all data event from models.
     *
     * @return mixed
     */

    public function get(): mixed
    {
        return $this->model->query()
            ->get();
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
                'date' => $data['date'],
            ], $data);

        $attendance->attendanceDetails()->create($data);

        return $attendance;
    }

    /**
     * Handle store data event to models.
     *
     * @param array $data
     *
     * @return mixed
     */
    public function storePermission(array $data): mixed
    {
        return $this->model->query()
            ->create($data);
    }

    /**
     * checkPrecense
     *
     * @param  string $userId
     * @param  string $type
     * @param  mixed $date
     * @return mixed
     */
    public function checkPrecense(string $userId, string $type, mixed $date): mixed
    {
        return $this->model->query()
            ->where('user_id', $userId)
            ->whereDate('date', $date)
            ->whereRelation('attendanceDetails', 'type', $type)
            ->first();
    }

    public function search(Request $request): mixed
    {

        return $this->model->query()
            ->with('user.attendance.attendanceDetails')
            ->when($request->name, function ($query) use ($request) {
                $query->whereRelation('user', 'name', 'LIKE', '%' . $request->name . '%');
            })
            ->when($request->classroom, function ($query) use ($request) {
                $query->whereRelation('user.student.classroom', 'name', 'LIKE', '%' . $request->classroom . '%');
            })
            ->when($request->date, function ($query) use ($request) {
                $query->with('user.attendance', function ($query) use ($request) {
                    $query->whereDate('date', $request->date);
                });
            })
            ->get();
    }

}
