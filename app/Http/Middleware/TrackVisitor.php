<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Visitor;

class TrackVisitor
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if (!$request->ajax() && !$this->isAssetRequest($request)) {
            if (!$request->hasCookie('visited')) {
                Visitor::create([
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->header('User-Agent'),
                    'page_url' => $request->fullUrl(),
                    'visited_at' => now(),
                    'visitor_id' => null,
                    'is_unique' => false,
                ]);

                cookie()->queue(cookie('visited', true, 2));
            }

            // Unik per hari
            $visitorId = hash('sha256', $request->ip() . $request->header('User-Agent'));
            $existingVisitor = Visitor::where('visitor_id', $visitorId)
                ->whereDate('visited_at', today())
                ->first();

            if (!$existingVisitor) {
                Visitor::create([
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->header('User-Agent'),
                    'page_url' => $request->fullUrl(),
                    'visited_at' => now(),
                    'visitor_id' => $visitorId,
                    'is_unique' => true,
                ]);
            }
        }

        return $response;
    }

    private function isAssetRequest(Request $request): bool
    {
        return preg_match('/\.(jpg|jpeg|png|gif|css|js|woff|woff2|ttf|svg)$/i', $request->path());
    }
}
