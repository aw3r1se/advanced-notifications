<?php

namespace Aw3r1se\AdvancedNotifications\Providers;

use Aw3r1se\AdvancedNotifications\Console\Commands\MakeAdvancedNotification;
use Aw3r1se\AdvancedNotifications\Console\Commands\MakeMessage;
use Aw3r1se\AdvancedNotifications\Console\Commands\MakeVariable;
use Illuminate\Support\ServiceProvider;

class AdvancedNotificationServiceProvider extends ServiceProvider
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
                __DIR__ . '/../../config/an.php' =>
                    config_path('an.php'),
            ], 'config');
        }

        $this->mergeConfigFrom(__DIR__ . '/../../config/an.php', 'an');

        $this->commands([
            MakeMessage::class,
            MakeVariable::class,
            MakeAdvancedNotification::class,
        ]);
    }
}
