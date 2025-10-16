@extends('admin.layout')

@section('content')
<div class="container mt-4">
    <h2>Upload Hero Image</h2>

    <form action="{{ route('admin.chooseimg.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mt-3">
            <label>Choose Image</label>
            <input type="file" name="image" class="form-control">
            @error('image') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-success mt-3">Upload</button>
    </form>
</div>
@endsection
