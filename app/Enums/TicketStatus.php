<?php

namespace App\Enums;

enum TicketStatus:string
{
    case New = 'new';
    case Open = 'open';
    case Responded = 'responded';
    case Closed = 'closed';

    public static function color($status): string
    {
        return match($status)
        {
            self::New => 'green',
            self::Open => 'blue',
            self::Responded => 'yellow',
            self::Closed => 'gray'
        };
    }

    public static function statuses(): array
    {
        return array_column(self::cases(), 'name', 'value');
    }
}