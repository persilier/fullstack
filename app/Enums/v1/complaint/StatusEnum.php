<?php

namespace App\Enums\v1\complaint;

enum StatusEnum:string
{
    case RESOLVED ="resolved";
    case NOT_RESOLVED ="notResolved";
    case RETIRED="retired";
}
