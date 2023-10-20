<?php

namespace UpstreamTeam\CrawlerDetect\Providers;

use Illuminate\Support\ServiceProvider;
use UpstreamTeam\CrawlerDetect\Macros\Request\IsCrawlerMacro;
use UpstreamTeam\CrawlerDetect\Services\CrawlerDetectService;

class CrawlerDetectServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->registerMacros();
    }

    public function register()
    {
        $this->app->singleton(CrawlerDetectService::class, function () {
            return new CrawlerDetectService($this->app);
        });

        $this->app->alias(CrawlerDetectService::class, 'crawler-detect');
    }

    protected function registerMacros(): void
    {
        IsCrawlerMacro::register();
    }
}
