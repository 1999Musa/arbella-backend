@extends('admin.layout')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-2xl p-8 mt-10">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Product</h2>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Product Title -->
        <div>
            <label for="title" class="block text-gray-700 font-medium mb-2">Product Title</label>
            <input type="text" name="title" id="title"
                value="{{ old('title', $product->title) }}"
                class="w-full border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 px-4 py-2" required>
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Category -->
        <div>
            <label for="product_category_id" class="block text-gray-700 font-medium mb-2">Category</label>
            <select name="product_category_id" id="product_category_id"
                class="w-full border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 px-4 py-2" required>
                <option value="">Select a category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->product_category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('product_category_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
            <textarea name="description" id="description" rows="4"
                class="w-full border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 px-4 py-2">{{ old('description', $product->description) }}</textarea>
            @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Image -->
        <div>
            <label for="image" class="block text-gray-700 font-medium mb-2">Product Image</label>
            <input type="file" name="image" id="image"
                class="w-full border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            @if($product->image)
                <div class="mt-3">
                    <p class="text-sm text-gray-600 mb-1">Current Image:</p>
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" class="h-24 rounded-lg border">
                </div>
            @endif
            @error('image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit -->
        <div class="flex justify-end">
            <a href="{{ route('admin.products.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 mr-3">
                Cancel
            </a>
            <button type="submit"
                class="px-5 py-2 bg-indigo-600 text-white font-medium rounded-xl hover:bg-indigo-700 transition">
                Update Product
            </button>
        </div>
    </form>
</div>
@endsection
