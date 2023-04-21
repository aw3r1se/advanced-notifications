<?php

namespace Aw3r1se\AdvancedNotifications\Enums;

use Aw3r1se\AdvancedNotifications\Enums\Contracts\ContentTypeEnumInterface;
use Aw3r1se\AdvancedNotifications\Enums\Traits\HasNameTrait;

enum ContentTypeEnum: string implements ContentTypeEnumInterface
{
    use HasNameTrait;

    case TITLE = 'TITLE';
    case SUBJECT = 'SUBJECT';
    case TEXT = 'TEXT';
}
