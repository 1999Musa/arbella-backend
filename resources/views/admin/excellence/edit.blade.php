@extends('admin.layout')


@section('content')
<div class="container mx-auto py-8">
    <h2 class="text-2xl font-bold mb-6">Edit Section: {{ $section->title }}</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.excellence.update', $section->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-6">
            <label class="block font-semibold mb-2">Current Images:</label>
            <div class="grid grid-cols-3 gap-4">
                @foreach($section->images ?? [] as $img)
                    <div class="relative border rounded p-2">
                        <img src="{{ asset('storage/'.$img) }}" class="w-full h-40 object-cover rounded" alt="Image">
                        <label class="absolute top-2 right-2 bg-red-500 text-white rounded px-2 cursor-pointer">
                            <input type="checkbox" name="remove_images[]" value="{{ $img }}" class="hidden">
                            Remove
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mb-6">
            <label class="block font-semibold mb-2">Upload New Images:</label>
            <input type="file" name="images[]" multiple class="border p-2 w-full" accept="image/*">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
            Update Section
        </button>
    </form>
</div>
@endsection
