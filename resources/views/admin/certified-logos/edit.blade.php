@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Edit Certified Logo</h1>
    <form method="POST" action="{{ route('admin.certified-logos.update', $certifiedLogo->id) }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Title (Optional)</label>
            <input type="text" name="title" value="{{ $certifiedLogo->title }}" class="form-control">
        </div>
        <div class="mb-3">
            <label>Image</label><br>
            <img src="{{ asset('storage/'.$certifiedLogo->image) }}" width="120" class="mb-2">
            <input type="file" name="image" class="form-control">
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
