<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index()
    {

        $categories = ProductCategory::all();
        return view('admin.product_categories.index', compact('categories'));
    }

    public function create()
    {

        return view('admin.product_categories.create');
    }

    public function store(Request $request)
    {
        // Validate input
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'hero_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:40960',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:40960',
        ]);

        // Create new category
        $category = new ProductCategory();
        $category->title = $data['title'];
        $category->description = $data['description'] ?? null;

        // Hero image
        $category->hero_image = $request->hasFile('hero_image')
            ? $request->file('hero_image')->store('products', 'public')
            : null;

        // Collection images
        $category->images = $request->hasFile('images')
            ? array_map(fn($f) => $f->store('products', 'public'), $request->file('images'))
            : [];

        $category->save();

        return redirect()->route('admin.product-categories.index')
            ->with('success', 'Category created successfully!');
    }




    public function edit(ProductCategory $product_category)
    {
        return view('admin.product_categories.edit', compact('product_category'));
    }

    public function update(Request $request, ProductCategory $product_category)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'hero_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:40960',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:40960',
        ]);

        if ($request->hasFile('hero_image')) {
            $data['hero_image'] = $request->file('hero_image')->store('products', 'public');
        }

        if ($request->hasFile('images')) {
            $paths = [];
            foreach ($request->file('images') as $file) {
                $paths[] = $file->store('products', 'public');
            }
            $data['images'] = $paths;
        }

        $product_category->update($data);
        return redirect()->route('admin.product-categories.index')->with('success', 'Updated!');
    }

    public function destroy(ProductCategory $product_category)
    {
        $product_category->delete();
        return back()->with('success', 'Deleted!');
    }

    // ✅ API for React
    public function apiIndex()
    {
        return response()->json(
            ProductCategory::all()->map(function ($cat) {
                return [
                    'id' => $cat->id,
                    'title' => $cat->title,
                    'description' => $cat->description,
                    'heroImage' => $cat->hero_image ? asset('storage/' . $cat->hero_image) : null,
                    'images' => $cat->images ? array_map(fn($img) => asset('storage/' . $img), $cat->images) : [],
                ];
            })
        );
    }
}
