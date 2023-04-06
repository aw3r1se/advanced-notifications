<?php

namespace Aw3r1se\AdvancedNotifications\Example;

use Aw3r1se\AdvancedNotifications\Classes\AdvancedNotification;
use Aw3r1se\AdvancedNotifications\Exceptions\IncorrectMessageException;
use Illuminate\Bus\Queueable;

class ExampleAdvancedNotification extends AdvancedNotification
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
