<?php

namespace App\Http\Controllers;

use App\Http\Requests\Sites\StoreSiteRequest;
use App\Http\Resources\SiteResource;
use App\Models\Site;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class SiteController extends Controller
{
    public function index(Request $request): Response
    {
        $sites = $request->user()
            ->sites()
            ->with('server')
            ->orderByDesc('created_at')
            ->get()
            ->map(fn (Site $site) => (new SiteResource($site))->toArray($request));

        return Inertia::render('sites/Index', [
            'sites' => $sites,
        ]);
    }

    public function store(StoreSiteRequest $request): RedirectResponse
    {
        $site = $request->user()->sites()->create($request->validated());

        return redirect()->route('sites.show', $site);
    }

    public function show(Request $request, Site $site): Response
    {
        abort_unless($site->user_id === $request->user()->id, 403);

        // $installUrl = rtrim(config('app.url'), '/').route('sites.scripts.install', [
        //     'site' => $site->id,
        //     'token' => $site->install_token,
        // ], false);

        // TODO : validate a wget command.
        // $wgetCommand = sprintf(
        //     'wget -qO sword-install.sh "%s" && sudo bash sword-install.sh 2>&1 | tee sword-install.log',
        //     $installUrl,
        // );

        return Inertia::render('sites/Show', [
            'site' => array_merge((new SiteResource($site))->resolve(), [
                'callback_signature' => $site->callback_signature,
                // 'wget_command' => $wgetCommand, // TODO : wget
            ]),
        ]);
    }
}
