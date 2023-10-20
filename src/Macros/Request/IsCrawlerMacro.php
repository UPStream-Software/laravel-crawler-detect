<?php

namespace UpstreamTeam\CrawlerDetect\Macros\Request;

use Illuminate\Support\Facades\Request;
use Jaybizzle\CrawlerDetect\CrawlerDetect;

class IsCrawlerMacro
{
    public static function register(): void
    {
        Request::macro('isCrawler', function () {

            return (new CrawlerDetect())->isCrawler($this->userAgent());
        });
    }
}
