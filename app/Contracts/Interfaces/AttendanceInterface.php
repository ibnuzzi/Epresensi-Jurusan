<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\StoreInterface;

interface AttendanceInterface extends StoreInterface
{
    /**
     * check precense user on that day
     *
     * @param string $userId
     * @param string $type
     * @param mixed $date
     * @return mixed
     */

     public function checkPrecense(string $userId,string $type,mixed $date): mixed;
}
