<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{ Endpoint, Site };
use App\Http\Requests\{ StoreEndpointRequest, UpdateEndpointRequest };

class EndpointController extends Controller
{
    public function index(Request $request, Site $site)
    {
        $endpoints = $site->endpoints()->paginate();

        return view('admin/endpoints/index', compact('site', 'endpoints'));
    }

    public function create(Request $request, Site $site)
    {
        return view('admin/endpoints/create', compact('site'));
    }

    public function store(StoreEndpointRequest $request, Site $site)
    {
        $site->endpoints()->create($request->validated());

        return redirect()
            ->route('endpoints.index', $site->id)
            ->with(['message' => 'Endpoint criado com sucesso!']);
    }

    public function edit(Request $request, Site $site, Endpoint $endpoint)
    {   
        return view('admin/endpoints/edit', compact('site', 'endpoint'));
    }

    public function update(UpdateEndpointRequest $request, Site $site, Endpoint $endpoint)
    {   
        $endpoint->update($request->validated());

        return redirect()
            ->route('endpoints.index', $site->id)
            ->with(['message' => 'Endpoint atualizado com sucesso!']);
    }

    public function destroy(Request $request, Site $site, Endpoint $endpoint)
    {
        $endpoint->delete();

        return redirect()
            ->route('endpoints.index', $site->id)
            ->with(['message' => 'Endpoint deletado com sucesso!']);
    }
}
