<?php

namespace Aw3r1se\AdvancedNotifications\Console\Commands;

use Aw3r1se\AdvancedNotifications\Classes\AdvancedNotification;

class MakeAdvancedNotification extends BaseCommand
{
    protected $signature = 'make:an {name}';

    public function handle()
    {
        $this->make('AdvancedNotification', AdvancedNotification::class);
    }
}
