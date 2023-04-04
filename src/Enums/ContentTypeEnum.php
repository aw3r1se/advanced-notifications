<?php

namespace Aw3r1se\LocalizedNotifications\Enums;

use Aw3r1se\LocalizedNotifications\Enums\Contracts\ContentTypeEnumInterface;
use Aw3r1se\LocalizedNotifications\Enums\Traits\HasName;

enum ContentTypeEnum implements ContentTypeEnumInterface
{
    use HasName;

    case TITLE;
    case SUBJECT;
    case TEXT;
}
