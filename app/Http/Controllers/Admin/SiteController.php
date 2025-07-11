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
        try {
            
            $sites = Site::paginate();

            return view('admin/sites/index', compact('sites'));
            
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['exception' => $e->getMessage()]);
        }
    }

    public function create(Request $request)
    {
        return view('admin/sites/create');
    }

    public function store(StoreSiteRequest $request)
    {
        try {
            $user = loggedUser();
            
            Site::create([
                'user_id' => $user->id,
                'url'     => $request->url
            ]);

            return redirect()
                ->route('sites.index')
                ->with(['message' => 'Site criado com sucesso!']);

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['exception' => $e->getMessage()])
                ->withInput();
        }
    }

    public function edit(Request $request, int $id)
    {
        try {

            $site = findSite($id);

            return view('admin/sites/edit', compact('site'));

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['exception' => $e->getMessage()]);
        }
    }

    public function update(UpdateSiteRequest $request, int $id)
    {
        try {

            $site = findSite($id);
            $site->url = $request->url;
            $site->save();

            return redirect()
                ->route('sites.index')
                ->with(['message' => 'Site editado com sucesso!']);

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['exception' => $e->getMessage()])
                ->withInput();
        }
    }

    public function destroy(Request $request, int $id)
    {
        try {

            $site = findSite($id);
            $site->delete();

            return redirect()
                ->route('sites.index')
                ->with(['message' => 'Site deletado com sucesso!']);

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['exception' => $e->getMessage()])
                ->withInput();
        }
    }
}
