<?php

namespace App\Enums;

enum SpotStatus: string
{
    case AVAILABLE = 'Disponível';
    case OCCUPIED  = 'Ocupada';
}
