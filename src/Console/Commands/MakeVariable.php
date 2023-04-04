<?php

namespace Aw3r1se\LocalizedNotifications\Console\Commands;

use Aw3r1se\LocalizedNotifications\Classes\Variable;

class MakeVariable extends BaseCommand
{
    protected $signature = 'make:ln-variable {name}';

    public function handle()
    {
        $this->make('Variable', Variable::class);
    }
}
