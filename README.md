## Устновка
<code>composer require aw3r1se/localized-notifications</code>
<p>Пакет регистрируется автоматически</p>

### Публикация миграции из вендора
<code>php artisan vendor:publish --provider="Aw3r1se\LocalizedNotifications\Providers\LocalizedNotificationServiceProvider" --tag=migrations</code>
<p>Также для публикации доступны теги <code>seeders</code> и <code>config</code></p>
