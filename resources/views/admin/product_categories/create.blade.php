@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Add Product Category</h1>
    <form action="{{ route('admin.product-categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Hero Image</label>
            <input type="file" name="hero_image" class="form-control">
        </div>
        <div class="mb-3">
            <label>Collection Images (multiple)</label>
            <input type="file" name="images[]" class="form-control" multiple>
        </div>
        <button class="btn btn-success">Save</button>
    </form>
</div>
@endsection
