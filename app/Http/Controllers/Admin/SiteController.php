<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Site;

class SiteController extends Controller
{
    public function index() {

        $sites = Site::all();

        return view(
            'admin/sites/index',
            compact('sites')
        );
    }
}
