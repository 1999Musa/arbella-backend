@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-4">Excellence Sections</h1>

@foreach($sections as $section)
    <div class="mb-6 p-4 border rounded">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold">{{ $section->title }}</h2>
            <a href="{{ route('admin.excellence.edit', $section->id) }}" class="text-white bg-blue-600 px-4 py-1 rounded hover:bg-blue-700 transition">
                Edit
            </a>
        </div>

        <div class="flex flex-wrap mt-2 gap-2">
            @foreach($section->images as $img)
                <img src="{{ asset('storage/' . $img) }}" class="w-32 h-20 object-cover rounded" alt="image">
            @endforeach
        </div>

        <a href="{{ route('admin.excellence.create') }}?section_id={{ $section->id }}" class="text-blue-500 mt-2 inline-block">
            Upload Images
        </a>
    </div>
@endforeach
@endsection
