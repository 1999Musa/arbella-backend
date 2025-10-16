<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExcellenceSection;
use Illuminate\Support\Facades\Storage;

class ExcellenceController extends Controller
{
    // Show all sections
    public function index()
    {
        $sections = ExcellenceSection::all();
        return view('admin.excellence.index', compact('sections'));
    }

    // Show create/upload view
    public function create()
    {
        $sections = ExcellenceSection::all();
        return view('admin.excellence.create', compact('sections'));
    }

    // Store uploaded images
    public function store(Request $request)
    {
        $request->validate([
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120', // max 5MB
            'section_id' => 'required|exists:excellence_sections,id',
        ]);

        $section = ExcellenceSection::findOrFail($request->section_id);

        $uploadedImages = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('excellence', 'public');
                $uploadedImages[] = $path;
            }
        }

        $section->images = array_merge($section->images ?? [], $uploadedImages);
        $section->save();

        return redirect()->back()->with('success', 'Images uploaded successfully!');
    }

    // Show edit form for a specific section
    public function edit($id)
    {
        $section = ExcellenceSection::findOrFail($id);
        return view('admin.excellence.edit', compact('section'));
    }

    // Optional: handle update if you want to allow replacing images
    public function update(Request $request, $id)
    {
        $section = ExcellenceSection::findOrFail($id);

        // Get images as a plain array
        $images = $section->images ?? [];

        // Remove selected images
        if ($request->has('remove_images')) {
            foreach ($request->remove_images as $img) {
                if (($key = array_search($img, $images)) !== false) {
                    Storage::disk('public')->delete($img); // delete from storage
                    unset($images[$key]); // remove from array
                }
            }
            $images = array_values($images); // reindex
        }

        // Upload new images if any
        if ($request->hasFile('images')) {
            $request->validate([
                'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            ]);

            foreach ($request->file('images') as $image) {
                $path = $image->store('excellence', 'public');
                $images[] = $path;
            }
        }

        // Assign back the modified array
        $section->images = $images;
        $section->save();

        return redirect()->back()->with('success', 'Section updated successfully!');
    }



    // API for frontend
    public function apiIndex()
    {
        $sections = ExcellenceSection::all();

        $data = $sections->map(function ($section) {
            return [
                'title' => $section->title,
                'images' => array_map(fn($img) => asset('storage/' . $img), $section->images ?? []),
            ];
        });

        return response()->json($data);
    }
}
