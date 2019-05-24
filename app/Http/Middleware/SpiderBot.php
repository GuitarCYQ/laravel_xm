<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SpiderBot
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        \App\Libs\Spiderbot::getInstance();
        return $next($request);
    }
}
