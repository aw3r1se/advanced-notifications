<?php

namespace Aw3r1se\AdvancedNotifications\Exceptions;

use Exception;
use Throwable;

class RelationDoesntExists extends Exception implements Throwable
{
    protected $code = 422;
    protected $message = "Relation doesn't exists";
}
