@extends('admin.layout')

@section('content')
<div class="container py-4">
    <h2>Upload Contact Hero Image</h2>
    <form action="{{ route('admin.contacthero.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" class="form-control mb-3" required>
        <button class="btn btn-success">Upload</button>
    </form>
</div>
@endsection
