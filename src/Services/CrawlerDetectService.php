<?php

namespace UpstreamTeam\CrawlerDetect\Services;

use Jaybizzle\CrawlerDetect\CrawlerDetect;
use UpstreamTeam\CrawlerDetect\Contracts\CrawlerDetectContract;

class CrawlerDetectService implements CrawlerDetectContract
{
    public function isCrawler(string $userAgent = null): bool
    {
        return (new CrawlerDetect())->isCrawler($userAgent !== null ? $userAgent : request()->userAgent());
    }
}
