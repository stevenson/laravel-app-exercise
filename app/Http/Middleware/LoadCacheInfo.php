<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\LedgerEntry;

class LoadCacheInfo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // TODO: optimization 1: fetch from cache
        // TODO: optimization 2: update cache on db change
        $request->merge([
            'cache' => LedgerEntry::getQueueAndCount()
        ]);
        return $next($request);
    }
}
