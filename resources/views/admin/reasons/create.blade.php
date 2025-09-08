@extends('admin.layout')
@section('title','Add Reason')

@section('content')
<h2 class="text-2xl font-bold mb-6">Add Reason</h2>
<form action="{{ route('admin.reasons.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="title" placeholder="Title" required class="input">
    <textarea name="description" placeholder="Description" required class="input"></textarea>
    <input type="file" name="image" class="input">
    <button type="submit" class="btn btn-primary">Add Reason</button>
</form>
@endsection
