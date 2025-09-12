@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Edit Product</h1>
    <form method="POST" action="{{ route('admin.product-sliders.update', $productSlider->id) }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" value="{{ $productSlider->title }}" class="form-control">
        </div>
        <div class="mb-3">
            <label>Description (optional)</label>
            <textarea name="description" class="form-control">{{ $productSlider->description }}</textarea>
        </div>
        <div class="mb-3">
            <label>Image</label><br>
            <img src="{{ asset('storage/'.$productSlider->image) }}" width="120" class="mb-2">
            <input type="file" name="image" class="form-control">
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
