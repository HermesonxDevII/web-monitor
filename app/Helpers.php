<?php

use App\Models\{ Site };
use Illuminate\Support\Facades\{ Auth };

if (!function_exists('findSite')) {
    function findSite(int $id): Site
    {
        return Site::findOrFail($id);
    }
}

if (!function_exists('loggedUser')) {
    function loggedUser()
    {
        return Auth::user();
    }
}