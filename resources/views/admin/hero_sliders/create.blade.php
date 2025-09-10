@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Add Hero Slider</h1>
    <form action="{{ route('admin.hero-sliders.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" class="form-control">
    </div>

    <div class="mb-3">
        <label>Subtitle</label>
        <input type="text" name="subtitle" class="form-control">
    </div>

    <div class="mb-3">
        <label>Hero Image</label>
        <input type="file" name="hero_image" class="form-control">
    </div>

    <button class="btn btn-success">Save</button>
</form>

</div>
@endsection
