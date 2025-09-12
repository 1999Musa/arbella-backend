@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Create Factory</h1>
    <form action="{{ route('admin.factory.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Hero Image</label>
            <input type="file" name="hero_image" class="form-control">
        </div>

        <div class="mb-3">
            <label>Gallery Images</label>
            <input type="file" name="gallery[]" class="form-control" multiple>
        </div>

        <div class="mb-3">
            <label>Certificates</label>
            <input type="file" name="certificates[]" class="form-control" multiple>
        </div>

        <div class="mb-3">
            <label>Clients</label>
            <input type="file" name="clients[]" class="form-control" multiple>
        </div>

        <button class="btn btn-success">Create</button>
    </form>
</div>
@endsection
