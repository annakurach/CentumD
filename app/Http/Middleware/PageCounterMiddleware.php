<?php

namespace App\Http\Middleware;

use App\Models\Link;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PageCounterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $short = $request->route()->parameter('short');
        $link = Link::where(['short_link' => $short])->firstOrFail();
        if ($link->max_count != 0 && $link->max_count <= $link->counter) {
            throw new NotFoundHttpException();
        }
        $link->increment('counter');
        $link->save();

        return $next($request);
    }
}
