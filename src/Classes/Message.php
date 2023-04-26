<?php

namespace Aw3r1se\AdvancedNotifications\Classes;

use Aw3r1se\AdvancedNotifications\Enums\Contracts\ContentTypeEnumInterface;
use Aw3r1se\AdvancedNotifications\Enums\Contracts\LocaleEnumInterface;
use Aw3r1se\AdvancedNotifications\Models\MessageContent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

abstract class Message
{
    protected static string $name;

    /**
     * @var array|string[]
     */
    protected static array $variables;

    public function __construct()
    {
        foreach (static::$variables as &$variable) {
            $variable = new $variable;
        }
    }

    /**
     * @return string
     */
    public static function getName(): string
    {
        return static::$name;
    }

    /**
     * @return array<Variable>
     */
    public static function getVariables(): array
    {
        return static::$variables;
    }

    /**
     * @param LocaleEnumInterface $locale
     * @return Collection
     */
    public function translate(LocaleEnumInterface $locale): Collection
    {
        $variables = static::getVariables();
        $contents = static::getAllContents($locale);
        foreach ($contents as $content) {
            $content->replaceVariables($variables);
        }

        return $contents;
    }

    /**
     * @param ContentTypeEnumInterface|null $type
     * @param LocaleEnumInterface|null $locale
     * @return MessageContent
     */
    public static function getContent(
        ?ContentTypeEnumInterface $type = null,
        ?LocaleEnumInterface $locale = null,
    ): MessageContent {
        return MessageContent::query()
            ->where('name', static::$name)
            ->where('locale', ($locale ?? config('an.locale'))->name())
            ->when($type, function (Builder $builder) use ($type) {
                $builder->where('type', $type->name());
            })->firstOrFail();
    }

    /**
     * @param LocaleEnumInterface|null $filter_by_locale
     * @param ContentTypeEnumInterface|null $filter_by_type
     * @return Collection
     */
    public static function getAllContents(
        ?LocaleEnumInterface $filter_by_locale = null,
        ?ContentTypeEnumInterface $filter_by_type = null,
    ): Collection {
        return MessageContent::query()
            ->where('name', static::getName())
            ->when($filter_by_locale, function (Builder $builder) use ($filter_by_locale) {
                $builder->where('locale', $filter_by_locale->name());
            })
            ->when($filter_by_type, function (Builder $builder) use ($filter_by_type) {
                $builder->where('type', $filter_by_type->name());
            })->get();
    }
}
