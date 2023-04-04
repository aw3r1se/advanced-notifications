<?php

namespace Aw3r1se\LocalizedNotifications\Enums;

use Aw3r1se\LocalizedNotifications\Enums\Contracts\ContentTypeEnumInterface;
use Aw3r1se\LocalizedNotifications\Enums\Traits\HasNameTrait;

enum ContentTypeEnum implements ContentTypeEnumInterface
{
    use HasNameTrait;

    case TITLE;
    case SUBJECT;
    case TEXT;
}
