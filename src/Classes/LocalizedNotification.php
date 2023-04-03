<?php

namespace Aw3r1se\LocalizedNotifications\Classes;

use Illuminate\Notifications\Notification;

abstract class LocalizedNotification extends Notification
{
    protected Message $message;
}
