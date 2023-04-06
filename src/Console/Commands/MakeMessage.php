<?php

namespace Aw3r1se\AdvancedNotifications\Console\Commands;

use Aw3r1se\AdvancedNotifications\Classes\Message;

class MakeMessage extends BaseCommand
{
    protected $signature = 'make:an-message {name}';

    public function handle()
    {
        $this->make('Message', Message::class);
    }
}
