<?php

namespace App\Enums\v1\Travel;

enum TravelModeEnum :string
{
    case BUS ="bus";
    case AVION ="avion";
    case BATEAU ="bateau";
    case TRAIN ="train";
    case VOITURE ="voiture";
    case TAXI ="taxi";
    case VOITURE_LOCATION ="voiture_location";
    case AUTRES="autres";
}
