<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{ Site, Endpoint };

class CheckController extends Controller
{
    public function index(Request $request, Site $site, Endpoint $endpoint)
    {
        $this->authorize('owner', $site);
        
        $checks = $endpoint->checks()->paginate();

        return view('admin.checks.index', compact('site', 'endpoint', 'checks'));
    }
}
