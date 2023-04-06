<?php

namespace Aw3r1se\AdvancedNotifications\Example;

use Aw3r1se\AdvancedNotifications\Classes\Message;

class ExampleMessage extends Message
{
    protected static string $name = 'Hello';

    protected static array $variables = [
        ExampleVariable::class,
    ];
}
