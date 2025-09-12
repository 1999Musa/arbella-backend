@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Upload Logo</h1>
    <form action="{{ route('admin.logo.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Logo Image</label>
            <input type="file" name="image" class="form-control" required>
        </div>

        <button class="btn btn-success">Save</button>
    </form>
</div>
@endsection
