<?php

namespace Aw3r1se\LocalizedNotifications\Providers;

use Aw3r1se\LocalizedNotifications\Console\Commands\MakeLocalizedNotification;
use Aw3r1se\LocalizedNotifications\Console\Commands\MakeMessage;
use Aw3r1se\LocalizedNotifications\Console\Commands\MakeVariable;
use Aw3r1se\LocalizedNotifications\Enums\ContentTypeEnum;
use Aw3r1se\LocalizedNotifications\Enums\Contracts\ContentTypeEnumInterface;
use Aw3r1se\LocalizedNotifications\Enums\Contracts\LocaleEnumInterface;
use Aw3r1se\LocalizedNotifications\Enums\LocaleEnum;
use Illuminate\Support\ServiceProvider;

class LocalizedNotificationServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../../database/seeders/MessageContentTableSeeder.stub' =>
                    database_path('seeders/MessageContentTableSeeder.php'),
            ], 'seeders');

            $this->publishes([
                __DIR__ . '/../../database/migrations/create_message_contents_table.stub' =>
                    database_path(
                        'migrations/'
                        . now()->format('Y_m_d_u')
                        . '_create_message_contents_table.php',
                    ),
            ], 'migrations');

            $this->publishes([
                __DIR__ . '/../../config/ln.php' =>
                    config_path('ln.php'),
            ], 'config');
        }

        $this->mergeConfigFrom(__DIR__ . '/../../config/ln.php', 'ln');

        $this->commands([
            MakeMessage::class,
            MakeVariable::class,
            MakeLocalizedNotification::class,
        ]);
    }
}
