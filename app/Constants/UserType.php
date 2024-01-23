<?php

namespace App\Constants;

enum UserType: string
{
    case ADMIN = 'admin';
    case STUDENT = 'student';
}
