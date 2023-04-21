<?php

namespace Aw3r1se\AdvancedNotifications\Enums;

use Aw3r1se\AdvancedNotifications\Enums\Contracts\LocaleEnumInterface;
use Aw3r1se\AdvancedNotifications\Enums\Traits\HasMatchTrait;
use Aw3r1se\AdvancedNotifications\Enums\Traits\HasNameTrait;

enum LocaleEnum: string implements LocaleEnumInterface
{
    use HasNameTrait;
    use HasMatchTrait;

    case EN = 'EN';
    case RU = 'RU';
    case KZ = 'KZ';
}
