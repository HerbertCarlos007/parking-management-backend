<?php

namespace App\Enums;

enum Role: string
{
    case ADMIN = 'Administrador';
    case MANAGER = 'Gerente';
    case USER = 'Usuario';
}
