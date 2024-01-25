<?php

namespace App\Enums;

enum AttendanceStatusEnum: string
{
    case ALPHA = 'alpha';
    case PERMISSION = 'permission';
    case PRESENT = 'present';
    case SICK = 'sick';
}

