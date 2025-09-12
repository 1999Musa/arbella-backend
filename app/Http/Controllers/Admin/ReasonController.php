<?php

// app/Http/Controllers/Admin/ReasonController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reason;
use Illuminate\Http\Request;

class ReasonController extends Controller
{
    public function index() {
        $reasons = Reason::all();
        return view('admin.reasons.index', compact('reasons'));
    }

    public function create() {
        return view('admin.reasons.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:40960',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('reasons', 'public');
        }

        Reason::create($data);
        return redirect()->route('admin.reasons.index')->with('success', 'Reason added!');
    }

    public function edit(Reason $reason) {
        return view('admin.reasons.edit', compact('reason'));
    }

    public function update(Request $request, Reason $reason) {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:40960',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('reasons', 'public');
        }

        $reason->update($data);
        return redirect()->route('admin.reasons.index')->with('success', 'Reason updated!');
    }

    public function destroy(Reason $reason) {
        $reason->delete();
        return redirect()->route('admin.reasons.index')->with('success', 'Reason deleted!');
    }

    //  API endpoint for React
    public function apiIndex() {
        return response()->json(
            Reason::all()->map(function ($reason) {
                return [
                    'id' => $reason->id,
                    'title' => $reason->title,
                    'description' => $reason->description,
                    'image' => $reason->image ? asset('storage/' . $reason->image) : null,
                ];
            })
        );
    }
}
