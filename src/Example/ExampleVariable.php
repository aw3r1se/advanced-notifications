<?php

namespace Aw3r1se\AdvancedNotifications\Example;

use App\Models\User;
use Aw3r1se\AdvancedNotifications\Classes\Variable;

class ExampleVariable extends Variable
{
    protected static string $name = '$user_name';

    protected static string $model = User::class;

    protected static string $field = 'name';
}
