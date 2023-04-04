<?php

namespace Aw3r1se\LocalizedNotifications\Example;

use Aw3r1se\LocalizedNotifications\Classes\LocalizedNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notifiable;

class ExampleLocalizedNotification extends LocalizedNotification
{
    use Queueable;
    use Notifiable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['telegram'];
    }

    public function toTelegram(object $notifiable)
    {

    }
}
