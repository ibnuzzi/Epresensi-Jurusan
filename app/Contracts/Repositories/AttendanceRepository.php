<?php

namespace App\Contracts\Repositories;

use App\Contracts\Repositories\BaseRepository;
use App\Contracts\Interfaces\AttendanceInterface;

class AttendanceRepository extends BaseRepository implements AttendanceInterface
{

    /**
     * store
     *
     * @param  mixed $data
     * @return mixed
     */
    public function store(array $data): mixed
    {
        return $this->model->query()
        ->create($data);
    }
}
