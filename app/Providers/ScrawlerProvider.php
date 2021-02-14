<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Scrawler\Scrawler;

class ScrawlerProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(Scrawler::class, function () {
            return new Scrawler();
        });
    }
}
