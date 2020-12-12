<?php

namespace Braumye\LaravelVercel\Console;

use Illuminate\Console\Command;

class PublishVercelCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vercel:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish all of the Vercel resources';

    public function handle()
    {
        $this->call('vendor:publish', [
            '--tag' => 'laravel-vercel',
            '--force' => true,
        ]);
    }
}
