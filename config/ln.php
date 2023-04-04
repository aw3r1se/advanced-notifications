<?php

use Aw3r1se\LocalizedNotifications\Enums\Contracts\LocaleEnumInterface;
use Aw3r1se\LocalizedNotifications\Enums\LocaleEnum;
use Illuminate\Support\Arr;

return [
    'path' => app_path('Notifications/Localized'),
    'messages_path' => app_path('Notifications/Localized/Messages'),
    'variables_path' => app_path('Notifications/Localized/Variables'),

    'locale' => Arr::first(
        LocaleEnum::cases(),
        function (LocaleEnumInterface $locale) {
            return $locale->name() == app()->getLocale();
        },
        LocaleEnum::EN,
    ),
];
