<?php

namespace Aw3r1se\LocalizedNotifications\Example;

use Aw3r1se\LocalizedNotifications\Classes\LocalizedNotification;
use Aw3r1se\LocalizedNotifications\Exceptions\IncorrectMessageException;
use Illuminate\Bus\Queueable;

class ExampleLocalizedNotification extends LocalizedNotification
{
    use Queueable;

    /**
     * Create a new notification instance.
     * @throws IncorrectMessageException
     */
    public function __construct()
    {
        parent::__construct(ExampleMessage::class);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }
}
