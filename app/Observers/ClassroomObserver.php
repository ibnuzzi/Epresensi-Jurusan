<?php

namespace App\Observers;

use Faker\Provider\Uuid;
use App\Models\Classroom;

class ClassroomObserver
{
    /**
     * Handle the classroom "creating" event.
     */
    public function creating(Classroom $classroom): void
    {
        $classroom->id = Uuid::uuid();
    }
}
