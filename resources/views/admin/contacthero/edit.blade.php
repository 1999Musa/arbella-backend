@extends('admin.layout')

@section('content')
<div class="container py-4">
    <h2>Edit Contact Hero Image</h2>
    <form action="{{ route('admin.contacthero.update', $hero->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <input type="file" name="image" class="form-control mb-3" required>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
