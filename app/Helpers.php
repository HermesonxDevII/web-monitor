<?php

use App\Models\{ Site, Endpoint };
use Illuminate\Support\Facades\{ Auth };

if (!function_exists('findSite')) {
    function findSite(int $id): Site
    {
        return Site::findOrFail($id);
    }
}

if (!function_exists('findEndpoint')) {
    function findEndpoint(int $id): Endpoint
    {
        return Endpoint::findOrFail($id);
    }
}

if (!function_exists('loggedUser')) {
    function loggedUser()
    {
        return Auth::user();
    }
}