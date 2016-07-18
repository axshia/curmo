<?php

namespace App\Http\Middleware;

use Closure;

class Api
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $now = time();

        $response = $next($request);

        $content = $response->getOriginalContent();
        $content['time'] = $now;
        $response->setContent($content);

        return $response;
    }
}
