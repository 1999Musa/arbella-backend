@extends('admin.layout')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow-lg rounded-2xl p-8 mt-10">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Category</h2>

    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Category Name -->
        <div>
            <label for="name" class="block text-gray-700 font-medium mb-2">Category Name</label>
            <input type="text" name="name" id="name"
                value="{{ old('name', $category->name) }}"
                class="w-full border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 px-4 py-2" required>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
            <textarea name="description" id="description" rows="4"
                class="w-full border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 px-4 py-2">{{ old('description', $category->description) }}</textarea>
            @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit -->
        <div class="flex justify-end">
            <a href="{{ route('admin.categories.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 mr-3">
                Cancel
            </a>
            <button type="submit"
                class="px-5 py-2 bg-indigo-600 text-white font-medium rounded-xl hover:bg-indigo-700 transition">
                Update Category
            </button>
        </div>
    </form>
</div>
@endsection
