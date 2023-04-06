<?php

namespace Aw3r1se\AdvancedNotifications\Console\Commands;

use Aw3r1se\AdvancedNotifications\Classes\Variable;

class MakeVariable extends BaseCommand
{
    protected $signature = 'make:an-variable {name}';

    public function handle()
    {
        $this->make('Variable', Variable::class);
    }
}
