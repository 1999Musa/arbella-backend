@extends('admin.layout')

@section('title', 'Edit Excellence Section')

@section('content')
<div class="container mx-auto">
    <!-- Header with Back Button -->
    <div class="flex justify-end mb-6">
        <a href="{{ route('admin.excellence.index') }}" class="flex items-center gap-2 bg-gray-500 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-gray-600 shadow-md transition-all">
            <svg xmlns="http://www.w.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to Excellence Sections
        </a>
    </div>

    <!-- Edit Form -->
    <div class="bg-white p-8 rounded-lg shadow-md max-w-4xl mx-auto">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 border-b pb-4">Edit Section: <span class="text-emerald-600">{{ $section->title }}</span></h2>

        @if(session('success'))
            <div class="bg-emerald-50 text-emerald-700 p-4 mb-6 rounded-lg text-sm">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.excellence.update', $section->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Current Images -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Current Images</label>
                <p class="text-xs text-gray-500 mb-4">Select images to remove by clicking the 'Remove' checkbox.</p>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @forelse($section->images ?? [] as $img)
                        <div class="relative group">
                            <img src="{{ asset('storage/'.$img) }}" class="w-full h-32 object-cover rounded-lg shadow-sm" alt="Image">
                            <div class="absolute inset-0 bg-black bg-opacity-20 group-hover:bg-opacity-40 transition-all rounded-lg"></div>
                            <label class="absolute top-2 right-2 bg-red-500 text-white text-xs px-2 py-1 rounded-full cursor-pointer hover:bg-red-600 transition-colors">
                                <input type="checkbox" name="remove_images[]" value="{{ $img }}" class="hidden">
                                Remove
                            </label>
                        </div>
                    @empty
                        <p class="text-gray-500 text-sm col-span-full">No images in this section yet.</p>
                    @endforelse
                </div>
            </div>

            <!-- Upload New Images -->
            <div class="mb-6">
                <label for="images" class="block text-sm font-medium text-gray-700 mb-2">Upload New Images</label>
                 <input type="file" name="images[]" id="images" multiple class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
                @error('images.*')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end border-t pt-6 mt-6">
                <button type="submit" class="flex items-center gap-2 bg-emerald-500 text-white px-5 py-2.5 rounded-lg text-sm font-semibold hover:bg-emerald-600 shadow-md transition-all">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                    </svg>
                    Update Section
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
