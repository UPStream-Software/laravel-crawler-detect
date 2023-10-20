<?php

namespace UpstreamTeam\CrawlerDetect\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CrawlerFilter
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->isCrawler()) {
            abort(403, 'Forbidden');
        }

        return $next($request);
    }
}
