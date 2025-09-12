@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Product Sliders</h1>
    <a href="{{ route('admin.product-sliders.create') }}" class="btn btn-primary mb-3">Add Product</a>
    <table class="table">
        <thead>
            <tr><th>Image</th><th>Title</th><th>Description</th><th>Actions</th></tr>
        </thead>
        <tbody>
        @foreach($sliders as $slider)
            <tr>
                <td><img src="{{ asset('storage/'.$slider->image) }}" width="100"></td>
                <td>{{ $slider->title }}</td>
                <td>{{ $slider->description }}</td>
                <td>
                    <a href="{{ route('admin.product-sliders.edit', $slider->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.product-sliders.destroy', $slider->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">Remove</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
