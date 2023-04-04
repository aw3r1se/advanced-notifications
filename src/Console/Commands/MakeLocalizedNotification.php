<?php

namespace Aw3r1se\LocalizedNotifications\Console\Commands;

use Aw3r1se\LocalizedNotifications\Classes\LocalizedNotification;

class MakeLocalizedNotification extends BaseCommand
{
    protected $signature = 'make:ln {name}';

    public function handle()
    {
        $this->make('LocalizedNotification', LocalizedNotification::class);
    }
}
