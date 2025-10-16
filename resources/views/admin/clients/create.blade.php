@extends('admin.layout')

@section('content')
<div class="container">
    <h2>Add Client</h2>
    <form action="{{ route('admin.clients.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" />
        </div>

        <div class="form-group">
            <label>Logo</label>
            <input type="file" name="logo" class="form-control" />
        </div>

        <button type="submit" class="btn btn-success mt-3">Save</button>
    </form>
</div>
@endsection
