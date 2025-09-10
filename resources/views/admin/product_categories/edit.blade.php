@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Edit Product Category</h1>
    <form action="{{ route('admin.product-categories.update',$product_category) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ $product_category->title }}" required>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ $product_category->description }}</textarea>
        </div>
        <div class="mb-3">
            <label>Hero Image</label><br>
            @if($product_category->hero_image)
                <img src="{{ asset('storage/'.$product_category->hero_image) }}" width="120" class="mb-2"><br>
            @endif
            <input type="file" name="hero_image" class="form-control">
        </div>
        <div class="mb-3">
            <label>Collection Images (upload new to replace)</label><br>
            @if($product_category->images)
                @foreach($product_category->images as $img)
                    <img src="{{ asset('storage/'.$img) }}" width="80" class="m-1">
                @endforeach
            @endif
            <input type="file" name="images[]" class="form-control" multiple>
        </div>
        <button class="btn btn-success">Update</button>
    </form>
</div>
@endsection
