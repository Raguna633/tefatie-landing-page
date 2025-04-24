<?php

namespace App\Http\Controllers;

use App\Models\AboutSection;
use Illuminate\Http\Request;

class AboutSectionController extends Controller
{
    public function index()
    {
        return response()->json(['data' => AboutSection::orderBy('id')->get()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'subtitle'    => 'nullable|string|max:255',
            'description' => 'required|string',
        ]);

        $item = AboutSection::create($validated);
        return response()->json($item, 201);
    }

    public function edit($id)
    {
        $item = AboutSection::findOrFail($id);
        return view('partials.home.about-form', compact('item'))->render();
    }

    public function update(Request $request, $id)
    {
        $item = AboutSection::findOrFail($id);
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'subtitle'    => 'nullable|string|max:255',
            'description' => 'required|string',
        ]);

        $item->update($validated);
        return response()->json($item);
    }

    public function destroy($id)
    {
        AboutSection::destroy($id);
        return response()->json(null, 204);
    }
}
