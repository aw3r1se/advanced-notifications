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
                __DIR__ . '/stubs/MessageContentTableSeeder.stub' =>
                    database_path('seeders/MessageContentTableSeeder.php'),
            ], 'seeders');
        }

        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        $this->commands([
            MakeLocalizedNotification::class,
        ]);
    }
}
