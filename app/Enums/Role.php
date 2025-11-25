<?php

namespace App\Enums;

enum Role: string
{
    case ADMIN = 'administrator';
    case MANAGER = 'gerente';
    case USER = 'usuario';
}
