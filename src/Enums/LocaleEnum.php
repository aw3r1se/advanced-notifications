<?php

namespace Aw3r1se\LocalizedNotifications\Enums;

use Aw3r1se\LocalizedNotifications\Enums\Contracts\LocaleEnumInterface;
use Aw3r1se\LocalizedNotifications\Enums\Traits\HasName;

enum LocaleEnum implements LocaleEnumInterface
{
    use HasName;

    case EN;
    case RU;
    case KZ;
}
