<?php

namespace App\Http\Controllers;

use App\Http\Requests\LinkCreateRequest;
use App\Models\Link;
use App\Services\LinkServiceInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LinkController extends Controller
{
    /**
     * @return View
     */
    public function show(): View
    {
        return view('links.form');
    }

    /**
     * @param LinkServiceInterface $linkService
     * @param LinkCreateRequest $request
     * @return RedirectResponse
     */
    public function create(LinkServiceInterface $linkService, LinkCreateRequest $request): RedirectResponse
    {
        $dto = $request->getDto();
        $link = $linkService->create($dto);

        return back()->with('success_short_link', route('links.redirect', ['link' => $link]));
    }

    /**
     * @param Link $link
     * @return RedirectResponse
     */
    public function redirect(Link $link): RedirectResponse
    {
        return redirect()->away($link->original_url);
    }
}
