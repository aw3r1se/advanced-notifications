<?php

namespace Aw3r1se\LocalizedNotifications\Classes;

use Aw3r1se\LocalizedNotifications\Models\MessageContent;

abstract class Message
{
    protected static string $name;

    /**
     * @var array|string[]
     */
    protected static array $variables;

    /**
     * @return string
     */
    public static function getName(): string
    {
        return static::$name;
    }

    /**
     * @param string $locale
     * @return string
     */
    public static function getContent(string $locale): string
    {
        return MessageContent::query()
            ->where('name', static::$name)
            ->where('locale', $locale)
            ->firstOrFail();
    }
}
