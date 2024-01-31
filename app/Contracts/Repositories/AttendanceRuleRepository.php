<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\AttendanceRuleInterface;
use App\Contracts\Repositories\BaseRepository;
use App\Models\AttendanceRule;

class AttendanceRuleRepository extends BaseRepository implements AttendanceRuleInterface
{

    /**
     * __construct
     *
     * @param  mixed $model
     * @return void
     */
    public function __construct(AttendanceRule $model)
    {
        $this->model = $model;
    }

    /**
     * get
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
        return $this->model->query()
        ->updateOrCreate(['day' => $data['day']], $data);
    }

    /**
     * showByDay
     *
     * @param  mixed $day
     * @return array
     */
    public function showByDay(string $day): mixed
    {
        return $this->model->query()
            ->where('day',$day)
            ->first();
    }
}
