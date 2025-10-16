@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Edit Product Category</h1>
    <form action="{{ route('admin.product-categories.update', $product_category) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="mb-3"><label>Title</label><input type="text" name="title" value="{{ $product_category->title }}" class="form-control" required></div>
        <div class="mb-3"><label>Description</label><textarea name="description" class="form-control">{{ $product_category->description }}</textarea></div>

        <div class="mb-3"><label>Product Name</label><input type="text" name="product_name" value="{{ $product_category->product_name }}" class="form-control"></div>
        <div class="mb-3"><label>Product Code</label><input type="text" name="product_code" value="{{ $product_category->product_code }}" class="form-control"></div>
        <div class="mb-3"><label>MOQ</label><input type="text" name="moq" value="{{ $product_category->moq }}" class="form-control"></div>
        <div class="mb-3"><label>FOB</label><input type="text" name="fob" value="{{ $product_category->fob }}" class="form-control"></div>

        <div class="mb-3">
            <label>Hero Image</label><br>
            @if($product_category->hero_image)
                <img src="{{ asset('storage/'.$product_category->hero_image) }}" width="120" class="mb-2"><br>
            @endif
            <input type="file" name="hero_image" class="form-control">
        </div>

        <div class="mb-3">
            <label>Collection Images</label><br>
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
