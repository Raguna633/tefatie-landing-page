<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return response()->json(['data' => Service::orderBy('id')->get()]);
    }

    public function create()
    {
        // form Add: kirim $item = null
        return view('partials.home.service-form', ['item' => null])->render();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'icon'        => 'required|string|max:50',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $item = Service::create($validated);
        return response()->json([
            'item'    => $item,
            'message' => 'Service created.'
        ], 201);
    }

    public function edit($id)
    {
        $item = Service::findOrFail($id);
        return view('partials.home.service-form', compact('item'))->render();
    }

    public function update(Request $request, $id)
    {
        $item = Service::findOrFail($id);
        $validated = $request->validate([
            'icon'        => 'required|string|max:50',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $item->update($validated);
        return response()->json([
            'item' => $item,
            'message' => 'Service updated'
        ]);
    }

    public function destroy($id)
    {
        Service::destroy($id);
        return response()->json(['message' => 'Deleted'], 204);
    }
}