<?php

namespace Aw3r1se\LocalizedNotifications\Providers;

use Aw3r1se\LocalizedNotifications\Console\MakeLocalizedNotification;
use Illuminate\Support\ServiceProvider;

class LocalizedNotificationServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../../database/seeders/MessageContentTableSeeder.stub' =>
                    database_path('seeders/MessageContentTableSeeder.php'),
            ], 'ln-seeders');

            $this->publishes([
                __DIR__ . '/../../database/migrations/create_message_contents_table.stub'
                => database_path(
                    'migrations/'
                    . now()->format('Y_m_d_u')
                    . '_create_message_contents_table.php'
                ),
            ], 'ln-migrations');
        }

        $this->commands([
            MakeLocalizedNotification::class,
        ]);
    }
}
