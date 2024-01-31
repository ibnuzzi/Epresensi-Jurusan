<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;

interface AttendanceRuleInterface extends GetInterface, StoreInterface
{
    /**
     * showByDay
     *
     * @param  mixed $day
     * @return mixed
     */
    public function showByDay(string $day): mixed;
}
