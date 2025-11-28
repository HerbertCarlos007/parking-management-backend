<?php

namespace App\Enums;

enum EntryStatus: string
{
    case OPEN = 'Aberta';
    case CLOSED = 'Fechada';
}
