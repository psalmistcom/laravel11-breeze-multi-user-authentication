<?php

namespace App\Enum;

enum UserRole: int
{
    case SUPER_ADMIN = 1;
    case ADMIN = 2;
    case NORMAL_USER = 3;
}
