<?php

namespace UpstreamTeam\CrawlerDetect\Contracts;

interface CrawlerDetectContract
{
    public function isCrawler(string $userAgent = null): bool;
}
