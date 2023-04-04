<?php

namespace Aw3r1se\LocalizedNotifications\Console\Commands;

use Aw3r1se\LocalizedNotifications\Classes\Message;

class MakeMessage extends BaseCommand
{
    protected $signature = 'make:ln-message {name}';

    public function handle()
    {
        $this->make('Message', Message::class);
    }
}
