@extends('admin.layout')

@section('content')
<div class="container">
    <h2>Edit Order Step</h2>
    <form action="{{ route('admin.order-steps.update', $order_step->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Step Number</label>
            <input type="text" name="step" class="form-control" value="{{ $order_step->step }}" required>
        </div>
        <div class="form-group">
            <label>Step Title</label>
            <input type="text" name="title" class="form-control" value="{{ $order_step->title }}" required>
        </div>
        <div class="form-group">
            <label>Description (optional)</label>
            <textarea name="description" class="form-control">{{ $order_step->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-success mt-3">Update</button>
    </form>
</div>
@endsection
