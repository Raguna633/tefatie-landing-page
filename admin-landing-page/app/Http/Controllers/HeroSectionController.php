<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeroSection;

class HeroSectionController extends Controller
{
    public function index()
    {
        // untuk AJAX listing JSON
        return response()->json(['data' => HeroSection::orderBy('id')->get()]);
    }

    public function create()
    {
        // form Add: kirim $item = null
        return view('partials.home.hero-form', ['item' => null])->render();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'heading'    => 'required|string|max:255',
            'subheading' => 'required|string|max:255',
            'background' => 'nullable|image',
        ]);

        if ($request->hasFile('background')) {
            $validated['background'] = $request->file('background')->store('hero-bg', 'public');
        }

        $item = HeroSection::create($validated);

        return response()->json([
            'item'    => $item,
            'message' => 'Hero section created.'
        ], 201);
    }

    public function edit($id)
    {
        $item = HeroSection::findOrFail($id);
        return view('partials.home.hero-form', compact('item'))->render();
    }

    public function update(Request $request, $id)
    {
        $item = HeroSection::findOrFail($id);

        $validated = $request->validate([
            'heading'    => 'required|string|max:255',
            'subheading' => 'required|string|max:255',
            'background' => 'nullable|image',
        ]);

        if ($request->hasFile('background')) {
            $validated['background'] = $request->file('background')->store('hero-bg', 'public');
        }

        $item->update($validated);

        return response()->json([
            'item'    => $item,
            'message' => 'Hero section updated.'
        ]);
    }

    public function destroy($id)
    {
        HeroSection::destroy($id);
        return response()->json(['message' => 'Deleted.'], 204);
    }
}
