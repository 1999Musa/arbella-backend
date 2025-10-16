@extends('admin.layout')

@section('content')
<div class="container mt-4">
    <h2>Edit Hero Image</h2>

    <div class="mb-3">
        <img src="{{ asset('storage/' . $chooseimg->image) }}" alt="Hero" class="img-fluid rounded" width="600">
    </div>

    <form action="{{ route('admin.chooseimg.update', $chooseimg->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Change Image</label>
            <input type="file" name="image" class="form-control">
            @error('image') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
</div>
@endsection
