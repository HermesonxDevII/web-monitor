<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{ Endpoint };
use App\Http\Requests\{ StoreEndpointRequest, UpdateEndpointRequest };

class EndpointController extends Controller
{
    public function index(Request $request, int $siteID)
    {
        $site = findSite($siteID);

        $endpoints = $site->endpoints;

        return view('admin/endpoints/index', compact('site', 'endpoints'));
    }

    public function create(Request $request, int $siteID)
    {
        $site = findSite($siteID);

        return view('admin/endpoints/create', compact('site'));
    }

    public function store(StoreEndpointRequest $request, int $siteID)
    {
        $site = findSite($siteID);

        Endpoint::create([
            'site_id'    => $site->id,
            'endpoint'   => $request->endpoint,
            'frequency'  => $request->frequency,
        ]);

        return redirect()
            ->route('endpoints.index', $site->id)
            ->with(['message' => 'Endpoint criado com sucesso!']);
    }

    public function edit(Request $request, int $siteID, int $id)
    {   
        $site = findSite($siteID);
        $endpoint = findEndpoint($id);

        return view('admin/endpoints/edit', compact('site', 'endpoint'));
    }

    public function update(UpdateEndpointRequest $request, int $siteID, int $id)
    {   
        $site = findSite($siteID);
        $endpoint = findEndpoint($id);
        $endpoint->endpoint = $request->endpoint;
        $endpoint->frequency = $request->frequency;
        $endpoint->save();

        return redirect()
            ->route('endpoints.index', $site->id)
            ->with(['message' => 'Endpoint atualizado com sucesso!']);
    }
}
