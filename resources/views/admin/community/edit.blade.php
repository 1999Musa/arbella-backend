@extends('admin.layout')

@section('content')
<div class="p-6">
  <h1 class="text-2xl font-bold mb-4">Edit Section</h1>

  <form method="POST" action="{{ route('admin.community.update', $section->id) }}" enctype="multipart/form-data">
    @csrf @method('PUT')

    <p class="font-semibold mb-2">Current Images:</p>
    <div class="flex gap-2 mb-4">
      @foreach($section->images as $img)
        <img src="{{ asset('storage/'.$img) }}" class="w-32 h-20 object-cover rounded" />
      @endforeach
    </div>

    <label class="block mb-2 font-semibold">Upload New Images (optional)</label>
    <input type="file" name="images[]" multiple class="mb-4">

    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Update</button>
  </form>
</div>
@endsection
