<?php

namespace AniketIN\Shiprocket\Commands;

use Illuminate\Console\Command;

class ShiprocketCommand extends Command
{
    public $signature = 'laravel-shiprocket';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
