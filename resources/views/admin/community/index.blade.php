@extends('admin.layout')

@section('content')
<div class="p-6">
  <h1 class="text-2xl font-bold mb-4">Community Sections</h1>

  <a href="{{ route('admin.community.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded">Add Images</a>

  <div class="mt-6">
    @foreach($sections as $section)
      <div class="border p-4 rounded mb-4">
        <h2 class="font-semibold text-lg capitalize">{{ $section->type }}</h2>
        <div class="flex gap-2 mt-2 flex-wrap">
          @foreach($section->images as $img)
            <img src="{{ asset('storage/'.$img) }}" class="w-32 h-20 object-cover rounded" />
          @endforeach
        </div>
        <div class="mt-2 flex gap-2">
          <a href="{{ route('admin.community.edit', $section->id) }}" class="text-blue-500">Edit</a>
          <form method="POST" action="{{ route('admin.community.destroy', $section->id) }}">
            @csrf @method('DELETE')
            <button type="submit" class="text-red-500">Delete</button>
          </form>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection
