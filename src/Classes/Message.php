<?php

namespace Aw3r1se\LocalizedNotifications\Classes;

use Aw3r1se\LocalizedNotifications\Enums\Contracts\ContentTypeEnumInterface;
use Aw3r1se\LocalizedNotifications\Enums\Contracts\LocaleEnumInterface;
use Aw3r1se\LocalizedNotifications\Models\MessageContent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

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
     * @return array|string[]
     */
    public function getVariables(): array
    {
        return static::$variables;
    }

    /**
     * @param LocaleEnumInterface|null $locale
     * @param ContentTypeEnumInterface|null $type
     * @return MessageContent
     */
    public static function getContent(
        ?LocaleEnumInterface $locale = null,
        ?ContentTypeEnumInterface $type = null,
    ): MessageContent {
        return MessageContent::query()
            ->where('name', static::$name)
            ->where('locale', ($locale ?? config('ln.locale'))->name())
            ->when($type, function (Builder $builder) use ($type) {
                $builder->where('type', $type->name());
            })->firstOrFail();
    }
}
