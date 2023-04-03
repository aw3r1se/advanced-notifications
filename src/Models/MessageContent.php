<?php

namespace Aw3r1se\LocalizedNotifications\Models;

use Aw3r1se\LocalizedNotifications\Classes\Message;
use Aw3r1se\LocalizedNotifications\Enum\LocaleEnum;
use Illuminate\Database\Eloquent\Model;

/**
 * @class MessageContent
 * @property int $id
 * @property string $name
 * @property string $locale
 * @property string $content
 */
class MessageContent extends Model
{
    protected $fillable = [
        'name',
        'locale',
        'content',
    ];

    /**
     * @param string $class
     * @param string $locale
     * @param string $content
     * @return static
     */
    public static function create(
        string $class,
        mixed $locale,
        string $content,
    ): static {
        $message_content = new MessageContent();
        $message_content->name = $class::getName();
        $message_content->locale = $locale instanceof LocaleEnum
            ? $locale->name
            : $locale;
        $message_content->content = $content;

        $message_content->save();
        return $message_content;
    }
}
