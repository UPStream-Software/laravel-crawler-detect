<?php

namespace UpstreamTeam\CrawlerDetect\Tests\Feature;

use Tests\TestCase;
use UpstreamTeam\CrawlerDetect\Facades\CrawlerDetectFacade;
use UpstreamTeam\CrawlerDetect\Macros\Request\IsCrawlerMacro;
use UpstreamTeam\CrawlerDetect\Services\CrawlerDetectService;

class CrawlerDetectTest extends TestCase
{
    public function testCrawlerDetectMacro(): void
    {
        IsCrawlerMacro::register();

        $request = request();

        $request->headers->set('user-agent', 'Mozilla/5.0 (Linux; Android 10; SM-N970F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Mobile Safari/537.36');
        $this->assertFalse($request->isCrawler());

        $request->headers->set('user-agent', 'Miro-HttpClient');
        $this->assertTrue($request->isCrawler());
    }

    public function testCrawlerDetectService(): void
    {
        $app = $this->createApplication();
        /** @var CrawlerDetectService $cd */
        $cd = $app->make('crawler-detect');

        $normalUserAgent = 'Mozilla/5.0 (Linux; Android 10; SM-N970F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Mobile Safari/537.36';
        $this->assertFalse($cd->isCrawler($normalUserAgent));

        $crawlerUserAgent = 'Miro-HttpClient';
        $this->assertTrue($cd->isCrawler($crawlerUserAgent));

        $this->assertFalse($cd->isCrawler());
    }

    public function testCrawlerDetectFacade(): void
    {
        $normalUserAgent = 'Mozilla/5.0 (Linux; Android 10; SM-N970F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Mobile Safari/537.36';
        $this->assertFalse(CrawlerDetectFacade::isCrawler($normalUserAgent));

        $crawlerUserAgent = 'Miro-HttpClient';
        $this->assertTrue(CrawlerDetectFacade::isCrawler($crawlerUserAgent));

        $this->assertFalse(CrawlerDetectFacade::isCrawler());
    }
}
