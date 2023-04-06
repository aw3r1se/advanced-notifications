<?php

namespace Aw3r1se\AdvancedNotifications\Exceptions;

use Exception;
use Throwable;

class IncorrectMessageException extends Exception implements Throwable
{
    protected $code = 422;
    protected $message = 'Incorrect message used';
}
