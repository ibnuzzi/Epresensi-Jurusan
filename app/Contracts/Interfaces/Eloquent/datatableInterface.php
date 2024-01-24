<?php

namespace App\Contracts\Interfaces\Eloquent;

interface datatableInterface
{
    /**
     * Handle get data instantly from models using datatables.
     *
     * @return mixed
     */

    public function datatable(): mixed;
}
