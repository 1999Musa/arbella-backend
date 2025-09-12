@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Add Community Record</h1>
    <form action="{{ route('admin.community.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Hero Image</label>
            <input type="file" name="hero_image" class="form-control">
        </div>

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Collage Images</label>
            <input type="file" name="images[]" class="form-control" multiple>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <button class="btn btn-success">Save</button>
    </form>
</div>
@endsection
