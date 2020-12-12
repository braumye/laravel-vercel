<?php

namespace Braumye\LaravelVercel;

use Braumye\LaravelVercel\Console\PublishVercelCommand;
use Illuminate\Support\ServiceProvider;

class LaravelVercelServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->registerCommands();
        $this->offerPublishing();
    }

    protected function offerPublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../stubs/index.php.stub' => base_path('api/index.php'),
                __DIR__.'/../stubs/.vercelignore.stub' => base_path('.vercelignore'),
                __DIR__.'/../stubs/vercel.json.stub' => base_path('vercel.json'),
            ], 'laravel-vercel');
        }
    }

    protected function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([PublishVercelCommand::class]);
        }
    }
}
