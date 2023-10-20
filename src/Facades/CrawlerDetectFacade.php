<?php

namespace UpstreamTeam\CrawlerDetect\Facades;

use Illuminate\Support\Facades\Facade;

class CrawlerDetectFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'crawler-detect';
    }
}
