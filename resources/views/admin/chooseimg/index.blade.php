@extends('admin.layout')

@section('content')
<div class="container mt-4">
    <h2>Hero Image</h2>

    @if($image)
        <div class="mb-4">
            <img src="{{ asset('storage/' . $image->image) }}" alt="Hero" class="img-fluid rounded" width="600">
        </div>
        <a href="{{ route('admin.chooseimg.edit', $image->id) }}" class="btn btn-primary">Edit Image</a>
    @else
        <a href="{{ route('admin.chooseimg.create') }}" class="btn btn-success">Upload Hero Image</a>
    @endif
</div>
@endsection
