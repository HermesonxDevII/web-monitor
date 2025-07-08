<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{ Validator, Auth, Log };
use App\Models\Site;
use App\Http\Requests\StoreSiteRequest;

class SiteController extends Controller
{

    public function create() {
        return view('admin/sites/create');
    }

    public function index() {

        $sites = Site::all();

        return view('admin/sites/index', compact('sites'));
    }

    public function store(StoreSiteRequest $request) {
        try {
            $user = Auth::user();
            
            Site::create([
                'user_id' => $user->id,
                'url'     => $request->url
            ]);

            return redirect()->route('sites.index');

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['exception' => $e->getMessage()])
                ->withInput();
        }
    }
}
