@extends('admin.layout')

@section('content')
<div class="container">
    <h2>Add New Order Step</h2>
    <form action="{{ route('admin.order-steps.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Step Number</label>
            <input type="text" name="step" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Step Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Description (optional)</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
</div>
@endsection
