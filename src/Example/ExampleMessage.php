<?php

namespace Aw3r1se\LocalizedNotifications\Example;

use Aw3r1se\LocalizedNotifications\Classes\Message;

class ExampleMessage extends Message
{
    protected static string $name = 'Hello';

    protected static array $variables = [
        ExampleVariable::class,
    ];
}
