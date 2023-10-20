# laravel-crawler-detect

## About

This package is a wrapper above the CrawlerDetect package.

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
