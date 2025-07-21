<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{ Log };
use App\Models\Site;
use App\Http\Requests\{ StoreSiteRequest, UpdateSiteRequest };

class SiteController extends Controller
{
    public function index(Request $request)
    {
        $sites = Site::paginate();

        return view('admin.sites.index', compact('sites'));
    }

    public function create(Request $request)
    {
        return view('admin.sites.create');
    }

    public function store(StoreSiteRequest $request)
    {
        $user = loggedUser()->sites()->create($request->validated());

        return redirect()
            ->route('sites.index')
            ->with(['message' => 'Site criado com sucesso!']);
    }

    public function edit(Request $request, Site $site)
    {
        $this->authorize('owner', $site);

        return view('admin.sites.edit', compact('site'));
    }

    public function update(UpdateSiteRequest $request, Site $site)
    {
        $this->authorize('owner', $site);

        $site->update($request->validated());

        return redirect()
            ->route('sites.index')
            ->with(['message' => 'Site editado com sucesso!']);
    }

    public function destroy(Request $request, Site $site)
    {
        $this->authorize('owner', $site);
        
        $site->delete();

        return redirect()
            ->route('sites.index')
            ->with(['message' => 'Site deletado com sucesso!']);
    }
}
