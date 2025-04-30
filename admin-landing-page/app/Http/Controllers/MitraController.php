<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    public function index()
    {
        return response()->json(['data' => Mitra::orderBy('order')->get()]);
    }

    public function create()
    {
        // form Add: kirim $item = null
        return view('partials.home.client-form', ['item' => null])->render();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'logo'  => 'required|image',
            'order' => 'required|integer',
        ]);
        $path = $request->file('logo')->store('mitra-logos', 'public');
        $validated['logo'] = $path;

        $item = Mitra::create($validated);
        return response()->json([
            'item'    => $item,
            'message' => 'Mitra created.'
        ], 201);
    }

    public function edit($id)
    {
        $item = Mitra::findOrFail($id);
        return view('partials.home.client-form', compact('item'))->render();
    }

    public function update(Request $request, $id)
    {
        $item = Mitra::findOrFail($id);
        $validated = $request->validate([
            'logo'  => 'nullable|image',
            'order' => 'required|integer',
        ]);
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('mitra-logos', 'public');
            $validated['logo'] = $path;
        }
        $item->update($validated);
        return response()->json([
            'item' => $item,
            'message' => 'Mitra updated'
        ]);
    }

    public function destroy($id)
    {
        Mitra::destroy($id);
        return response()->json(['message' => 'Deleted'], 204);
    }
}
