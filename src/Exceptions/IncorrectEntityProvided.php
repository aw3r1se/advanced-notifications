<?php

namespace Aw3r1se\LocalizedNotifications\Exceptions;

use Exception;
use Throwable;

class IncorrectEntityProvided extends Exception implements Throwable
{
    protected $code = 422;
    protected $message = 'Incorrect message used';
}
