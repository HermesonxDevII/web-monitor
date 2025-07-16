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

        return view('admin/sites/index', compact('sites'));
    }

    public function create(Request $request)
    {
        return view('admin/sites/create');
    }

    public function store(StoreSiteRequest $request)
    {
        $user = loggedUser();
            
        Site::create([
            'user_id' => $user->id,
            'url'     => $request->url
        ]);

        return redirect()
            ->route('sites.index')
            ->with(['message' => 'Site criado com sucesso!']);
    }

    public function edit(Request $request, Site $site)
    {
        return view('admin/sites/edit', compact('site'));
    }

    public function update(UpdateSiteRequest $request, Site $site)
    {
        $site->url = $request->url;
        $site->save();

        return redirect()
            ->route('sites.index')
            ->with(['message' => 'Site editado com sucesso!']);
    }

    public function destroy(Request $request, Site $site)
    {
        $site->delete();

        return redirect()
            ->route('sites.index')
            ->with(['message' => 'Site deletado com sucesso!']);
    }
}
