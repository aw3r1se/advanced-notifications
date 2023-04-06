<?php

namespace Aw3r1se\AdvancedNotifications\Enums;

use Aw3r1se\AdvancedNotifications\Enums\Contracts\LocaleEnumInterface;
use Aw3r1se\AdvancedNotifications\Enums\Traits\HasMatchTrait;
use Aw3r1se\AdvancedNotifications\Enums\Traits\HasNameTrait;

enum LocaleEnum implements LocaleEnumInterface
{
    use HasNameTrait;
    use HasMatchTrait;

    case EN;
    case RU;
    case KZ;
}
