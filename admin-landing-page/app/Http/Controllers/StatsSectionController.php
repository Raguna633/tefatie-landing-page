<?php

namespace App\Http\Controllers;

use App\Models\Stats;
use Illuminate\Http\Request;

class StatsSectionController extends Controller
{
    public function index()
    {
        return response()->json(['data' => Stats::orderBy('id')->get()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'count' => 'required|integer',
            'label' => 'required|string|max:100',
        ]);

        $item = Stats::create($validated);
        return response()->json($item, 201);
    }

    public function edit($id)
    {
        $item = Stats::findOrFail($id);
        return view('partials.home.stats-form', compact('item'))->render();
    }

    public function update(Request $request, $id)
    {
        $item = Stats::findOrFail($id);
        $validated = $request->validate([
            'count' => 'required|integer',
            'label' => 'required|string|max:100',
        ]);

        $item->update($validated);
        return response()->json($item);
    }

    public function destroy($id)
    {
        Stats::destroy($id);
        return response()->json(null, 204);
    }
}
