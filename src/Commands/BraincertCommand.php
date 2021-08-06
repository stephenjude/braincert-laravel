<?php

namespace Stephenjude\Braincert\Commands;

use Illuminate\Console\Command;

class BraincertCommand extends Command
{
    public $signature = 'braincert-laravel';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
