<?php

use Aw3r1se\AdvancedNotifications\Enums\Contracts\LocaleEnumInterface;
use Aw3r1se\AdvancedNotifications\Enums\LocaleEnum;
use Illuminate\Support\Arr;

return [
    'path' => app_path('Notifications/Advanced'),
    'messages_path' => app_path('Notifications/Advanced/Messages'),
    'variables_path' => app_path('Notifications/Advanced/Variables'),

    'locale' => Arr::first(
        LocaleEnum::cases(),
        function (LocaleEnumInterface $locale) {
            return $locale->name() == app()->getLocale();
        },
        LocaleEnum::EN,
    ),
];
