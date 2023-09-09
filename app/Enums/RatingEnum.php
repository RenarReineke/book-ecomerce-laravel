<?php

namespace App\Enums;

enum RatingEnum: int {
    case None = 0;
    case Deused = 1;
    case Bad = 2;
    case Alright = 3;
    case Good = 4;
    case Grate = 5;
}