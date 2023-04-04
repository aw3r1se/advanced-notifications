<?php

namespace Aw3r1se\LocalizedNotifications\Enums;

use Aw3r1se\LocalizedNotifications\Enums\Contracts\LocaleEnumInterface;
use Aw3r1se\LocalizedNotifications\Enums\Traits\HasMatchTrait;
use Aw3r1se\LocalizedNotifications\Enums\Traits\HasNameTrait;

enum LocaleEnum implements LocaleEnumInterface
{
    use HasNameTrait;
    use HasMatchTrait;

    case EN;
    case RU;
    case KZ;
}
