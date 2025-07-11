<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{ Endpoint, Site };

class EndpointController extends Controller
{
    public function index(Request $request, int $siteID)
    {
        $site = findSite($siteID);

        $endpoints = $site->endpoints;

        return view('admin/endpoints/index', compact('site', 'endpoints'));
    }
}
