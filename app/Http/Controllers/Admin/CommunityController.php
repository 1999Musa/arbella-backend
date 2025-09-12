<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Community;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CommunityController extends Controller
{
    // API for React
    public function apiIndex()
    {
        return response()->json(Community::all());
    }

    // Admin Index
    public function index()
    {
        $communities = Community::all();
        return view('admin.community.index', compact('communities'));
    }

    public function create()
    {
        return view('admin.community.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
        ]);

        if ($request->hasFile('hero_image')) {
            $data['hero_image'] = $request->file('hero_image')->store('community', 'public');
        }

        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $img) {
                $imagePaths[] = $img->store('community', 'public');
            }
            $data['images'] = $imagePaths;
        }

        Community::create($data);
        return redirect()->route('admin.community.index')->with('success', 'Created successfully');
    }

    public function edit(Community $community)
    {
        return view('admin.community.edit', compact('community'));
    }

    public function update(Request $request, Community $community)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp | max:40960',
        ]);

        if ($request->hasFile('hero_image')) {
            $data['hero_image'] = $request->file('hero_image')->store('community', 'public');
        }

        if ($request->hasFile('images')) {
            $imagePaths = $community->images ?? [];
            foreach ($request->file('images') as $img) {
                $imagePaths[] = $img->store('community', 'public');
            }
            $data['images'] = $imagePaths;
        }

        $community->update($data);
        return redirect()->route('admin.community.index')->with('success', 'Updated successfully');
    }

    public function destroy(Community $community)
    {
        $community->delete();
        return redirect()->route('admin.community.index')->with('success', 'Deleted successfully');
    }

    // Remove hero image
    public function removeHeroImage(Community $community)
    {
        if ($community->hero_image) {
            Storage::disk('public')->delete($community->hero_image);
            $community->hero_image = null;
            $community->save();
        }
        return response()->json(['success' => true]);
    }

    // Remove specific image from collage
    public function removeImage(Community $community, $index)
    {
        $images = $community->images ?? [];
        if(isset($images[$index])) {
            Storage::disk('public')->delete($images[$index]);
            array_splice($images, $index, 1);
            $community->images = $images;
            $community->save();
        }
        return response()->json(['success' => true]);
    }
}
