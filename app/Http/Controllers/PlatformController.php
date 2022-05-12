<?php

namespace App\Http\Controllers;

use App\Models\Platform;
use Illuminate\Http\Request;

class PlatformController extends Controller
{
    public function index()
    {
        $platforms = Platform::All();
        return view('admin.platforms.index', compact('platforms'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Platform $platform)
    {
        //
    }

    public function edit(Platform $platform)
    {
        //
    }

    public function update(Request $request, Platform $platform)
    {
        //
    }

    public function destroy(Platform $platform)
    {
        //
    }
}
