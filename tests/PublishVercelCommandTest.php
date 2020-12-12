<?php

namespace Braumye\LaravelVercel\Tests;

use Braumye\LaravelVercel\LaravelVercelServiceProvider;
use Orchestra\Testbench\TestCase;

class PublishVercelCommandTest extends TestCase
{
    /** @test */
    public function it_can_publish_all_vercel_resources()
    {
        $files = collect([
            base_path('api/index.php'),
            base_path('vercel.json'),
            base_path('.vercelignore'),
        ]);

        $files->map(fn ($file) => file_exists($file) && unlink($file));
        $files->map(fn ($file) => $this->assertFileDoesNotExist($file));
        $this->artisan('vercel:publish')->assertExitCode(0);
        $files->map(fn ($file) => $this->assertFileExists($file));
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelVercelServiceProvider::class,
        ];
    }
}
