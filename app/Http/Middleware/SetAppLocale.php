<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetAppLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Find locale based on url => de => nein-pro-minute.ch, fr => non-par-minute.ch
        $langs = [
            "de" => [
                "nein-pro-minute.ch",
                "10-mio-ch-crowdfunding.ddev.site",
            ],
            "fr" => [
                "non-par-minute.ch",
                "fr.10-mio-ch-crowdfunding.ddev.site",
            ],
        ];

        $host = $request->getHost();

        foreach ($langs as $lang => $hosts) {
            if (in_array($host, $hosts)) {
                $locale = $lang;
                break;
            }
        }

        app()->setLocale($locale ?? 'de');
        return $next($request);
    }
}
