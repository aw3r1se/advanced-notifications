<?php

namespace Aw3r1se\AdvancedNotifications\Enums\Traits;

use Aw3r1se\AdvancedNotifications\Enums\Contracts\LocaleEnumInterface;
use Illuminate\Support\Arr;

trait HasMatchTrait
{
    /**
     * @param string|null $locale
     * @return static
     */
    public static function match(?string $locale = null): static
    {
        return Arr::first(
            static::cases(),
            function (LocaleEnumInterface $enum) use ($locale) {
                return $enum->name() == $locale;
            },
            config('an.locale'),
        );
    }
}
