@extends('admin.layout')

@section('content')
<div class="container">
    <h2>Edit Client</h2>
    <form action="{{ route('admin.clients.update', $client->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" value="{{ $client->name }}" class="form-control" />
        </div>

        <div class="form-group">
            <label>Logo</label>
            <input type="file" name="logo" class="form-control" />
            @if($client->logo)
                <img src="{{ asset('storage/' . $client->logo) }}" width="120" class="mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
</div>
@endsection
