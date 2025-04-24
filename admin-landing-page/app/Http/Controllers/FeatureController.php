<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function index()
    {
        return response()->json(['data' => Feature::orderBy('id')->get()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'button_text' => 'nullable|string|max:50',
        ]);

        $item = Feature::create($validated);
        return response()->json($item, 201);
    }

    public function edit($id)
    {
        $item = Feature::findOrFail($id);
        return view('partials.home.feature-form', compact('item'))->render();
    }

    public function update(Request $request, $id)
    {
        $item = Feature::findOrFail($id);
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'button_text' => 'nullable|string|max:50',
        ]);

        $item->update($validated);
        return response()->json($item);
    }

    public function destroy($id)
    {
        Feature::destroy($id);
        return response()->json(null, 204);
    }
}
