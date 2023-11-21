# laravel-crawler-detect

## About

Welcome to the Laravel Crawler Detect repository, your powerful ally in identifying and handling web crawlers and bots within your Laravel applications. In the vast world of web traffic, being able to discern between genuine users and automated crawl bots is crucial. This tool is designed to seamlessly integrate with your Laravel projects, giving you the ability to efficiently detect spiders, bots, and crawler software.

## Install

Add in ``composer.json``

```
"repositories": [
        // ...
        {
            "type": "vcs",
            "url": "git@github.com:UPStream-Software/laravel-crawler-detect.git"
        },
        // ...

"require": {
    // ...
    "upstream-team/laravel-search-crawler": "^0.1.0",
    // ...
```

## Usage

#### 1. Macros

```
request()->isCrawler();
```

#### 2. Middleware

```
    protected $middlewareGroups = [
        'web' => [
            // ...
            UpstreamTeam\CrawlerDetect\Middleware\CrawlerFilter::class,
        ],
        // ...
```

#### 3. Service

```
app('crawler-detect')->isCrawler();
// or
app('crawler-detect')->isCrawler($userAgent);
```

#### 4. Facade

```
CrawlerDetectFacade::isCrawler();
// or
CrawlerDetectFacade::isCrawler($userAgent);
```
