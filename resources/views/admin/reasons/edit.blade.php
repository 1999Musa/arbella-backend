@extends('admin.layout')
@section('title','Edit Reason')

@section('content')
<h2 class="text-2xl font-bold mb-6">Edit Reason</h2>
<form action="{{ route('admin.reasons.update',$reason) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="title" value="{{ $reason->title }}" required class="input">
    <textarea name="description" required class="input">{{ $reason->description }}</textarea>
    <input type="file" name="image" class="input">
    @if($reason->image)
    <img src="{{ asset('storage/'.$reason->image) }}" class="w-24 h-24 object-cover mt-2"/>
    @endif
    <button type="submit" class="btn btn-primary">Update Reason</button>
</form>
@endsection
