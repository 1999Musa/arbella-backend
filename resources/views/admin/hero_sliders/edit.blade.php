@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Edit Hero Slider</h1>
    <form action="{{ route('admin.hero-sliders.update', $hero_slider->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ $hero_slider->title }}">
        </div>
        <div class="mb-3">
            <label>Subtitle</label>
            <input type="text" name="subtitle" class="form-control" value="{{ $hero_slider->subtitle }}">
        </div>
        <div class="mb-3">
            <label>Current Hero Image</label><br>
            <img src="{{ asset('storage/' . $hero_slider->hero_image) }}" width="200" class="mb-2">
            <input type="file" name="hero_image" class="form-control">
        </div>
        <button class="btn btn-success">Update</button>
    </form>
</div>
@endsection
