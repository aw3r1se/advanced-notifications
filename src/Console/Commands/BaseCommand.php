<?php

namespace Aw3r1se\LocalizedNotifications\Console\Commands;

use Aw3r1se\LocalizedNotifications\Classes\Message;
use Aw3r1se\LocalizedNotifications\Classes\Variable;
use Illuminate\Console\Command;

abstract class BaseCommand extends Command
{
    abstract public function handle();

    protected function definePath(string $type): string
    {
        if ($this->hasOption('path')) {
            return $this->option('path');
        }

        return match ($type) {
            Message::class => config('ln.message_path'),
            Variable::class => config('ln.variable_path'),
            default => config('ln.path'),
        };
    }
}
