@extends('admin.layout')

@section('content')
<div class="p-6">
  <h1 class="text-2xl font-bold mb-4">Upload Community Images</h1>

  <form method="POST" action="{{ route('admin.community.store') }}" enctype="multipart/form-data">
    @csrf

    <label class="block mb-2 font-semibold">Section Type</label>
    <select name="type" class="border p-2 rounded mb-4 w-64" required>
      <option value="">Select</option>
      <option value="hero">Hero Section</option>
      <option value="employees">Community for Employees</option>
      <option value="gallery">Gallery</option>
    </select>

    <label class="block mb-2 font-semibold">Upload Image(s)</label>
    <input type="file" name="images[]" multiple required class="mb-4">

    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">Upload</button>
  </form>
</div>
@endsection
