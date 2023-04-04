<?php

namespace Aw3r1se\LocalizedNotifications\Models;

use Aw3r1se\LocalizedNotifications\Classes\Message;
use Aw3r1se\LocalizedNotifications\Enums\ContentTypeEnum;
use Aw3r1se\LocalizedNotifications\Enums\Contracts\ContentTypeEnumInterface;
use Aw3r1se\LocalizedNotifications\Enums\Contracts\LocaleEnumInterface;
use Aw3r1se\LocalizedNotifications\Enums\LocaleEnum;
use Aw3r1se\LocalizedNotifications\Exceptions\IncorrectMessageException;
use Illuminate\Database\Eloquent\Model;

/**
 * @class MessageContent
 * @property int $id
 * @property Message $name
 * @property ContentTypeEnum $type
 * @property LocaleEnum $locale
 * @property string $content
 */
class MessageContent extends Model
{
    protected $fillable = [
        'name',
        'type',
        'locale',
        'content',
    ];

    /**
     * @param string $message_class
     * @param ContentTypeEnumInterface $type
     * @param LocaleEnumInterface $locale
     * @param string $content
     * @return static
     * @throws IncorrectMessageException
     */
    public static function create(
        string $message_class,
        ContentTypeEnumInterface $type,
        LocaleEnumInterface $locale,
        string $content,
    ): static {
        $message_content = new MessageContent();
        $message = new $message_class;
        if (!(new $message_class instanceof Message)) {
            throw new IncorrectMessageException();
        }

        $message_content->name = $message::getName();
        $message_content->type = $type->name();
        $message_content->locale = $locale->name();
        $message_content->content = $content;
        $message_content->save();

        return $message_content;
    }
}
