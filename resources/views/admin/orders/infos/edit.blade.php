@extends('admin.layout')

@section('content')
<div class="container">
    <h2>Edit Important Info</h2>
    <form action="{{ route('admin.important-infos.update', $important_info->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Title (Required)</label>
            <input type="text" name="title" class="form-control" value="{{ $important_info->title }}" required>
        </div>
        <div class="form-group">
            <label>List Items (Optional, one per line)</label>
            <textarea name="list_items[]" class="form-control">{{ implode("\n", $important_info->list_items ?? []) }}</textarea>
        </div>
        <button type="submit" class="btn btn-success mt-3">Update</button>
    </form>
</div>
@endsection
