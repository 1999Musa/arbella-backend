<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;

class ProductController extends Controller
{

    public function index()
    {
        // eager load category
        $products = Product::with('category')->latest()->paginate(12);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::orderBy('title')->get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string',
            'description' => 'nullable|string',
            'product_code' => 'nullable|string',
            'moq' => 'nullable|string',
            'fob' => 'nullable|string',
            'images.*' => 'nullable|image|max:5120',
        ]);

        $product = Product::create($data);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $img) {
                $path = $img->store('products', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'path' => $path,
                    'sort_order' => $index,
                ]);
            }
        }

        return redirect()->route('admin.products.index')->with('success','Product created.');
    }

    public function edit(Product $product)
    {
        $categories = Category::orderBy('title')->get();
        $product->load('images');
        return view('admin.products.edit', compact('product','categories'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string',
            'description' => 'nullable|string',
            'product_code' => 'nullable|string',
            'moq' => 'nullable|string',
            'fob' => 'nullable|string',
            'images.*' => 'nullable|image|max:5120',
            'remove_images' => 'nullable|array', // array of image ids to remove
        ]);

        // remove requested images
        if (!empty($request->input('remove_images'))) {
            foreach ($request->input('remove_images') as $imgId) {
                $img = ProductImage::find($imgId);
                if ($img) {
                    \Storage::disk('public')->delete($img->path);
                    $img->delete();
                }
            }
        }

        $product->update($data);

        if ($request->hasFile('images')) {
            $existingCount = $product->images()->count();
            foreach ($request->file('images') as $index => $img) {
                $path = $img->store('products', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'path' => $path,
                    'sort_order' => $existingCount + $index,
                ]);
            }
        }

        return redirect()->route('admin.products.index')->with('success','Product updated.');
    }

    public function destroy(Product $product)
    {
        foreach ($product->images as $img) {
            \Storage::disk('public')->delete($img->path);
            $img->delete();
        }
        $product->delete();
        return back()->with('success','Product deleted.');
    }
}
