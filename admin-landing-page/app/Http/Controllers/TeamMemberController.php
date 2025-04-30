<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    public function index()
    {
        return response()->json(['data' => TeamMember::orderBy('id')->get()]);
    }

    public function create()
    {
        // form Add: kirim $item = null
        return view('partials.home.team-form', ['item' => null])->render();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'photo'    => 'nullable|image',
        ]);
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('team-photos', 'public');
            $validated['photo'] = $path;
        }
        $item = TeamMember::create($validated);
        return response()->json([
            'item'    => $item,
            'message' => 'Member Added.'
        ], 201);
    }

    public function edit($id)
    {
        $item = TeamMember::findOrFail($id);
        return view('partials.home.team-form', compact('item'))->render();
    }

    public function update(Request $request, $id)
    {
        $item = TeamMember::findOrFail($id);
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'photo'    => 'nullable|image',
        ]);
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('team-photos', 'public');
            $validated['photo'] = $path;
        }
        $item->update($validated);
        return response()->json([
            'item' => $item,
            'message' => 'Member updated'
        ]);
    }

    public function destroy($id)
    {
        TeamMember::destroy($id);
        return response()->json(['message' => 'Deleted'], 204);
    }
}
