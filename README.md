composer require aw3r1se/localized-notifications

sail artisan vendor:publish --provider="Aw3r1se\LocalizedNotifications\Providers\LocalizedNotificationServiceProvider"

sail artisan migrate

sail artisan db:seed --class=MessageContentTableSeeder
