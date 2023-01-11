<?php

namespace App\Enums\v1\Travel;

enum TravelStatusEnum : string
{
    case PENDING="pending";
    case APPROVED="approved";
    case REJECTED="rejected";
}
