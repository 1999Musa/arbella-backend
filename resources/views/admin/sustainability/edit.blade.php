@extends('admin.layout')

@section('content')
    <div class="container">
        <h1>Edit Sustainability Pillar</h1>
        <form action="{{ route('admin.sustainability.update', $sustainability->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf @method('PUT')

            <!-- Hero Image -->
            <div class="mb-3">
                <label>Hero Image</label>
                <input type="file" name="hero_image" class="form-control mt-1">
                @if($sustainability->hero_image)
                    <div class="mt-2 flex items-center gap-4" id="hero-image-container">
                        <img src="{{ Storage::url($sustainability->hero_image) }}" width="100" class="rounded">
                        <button type="button" class="btn btn-danger" id="remove-hero-btn">Remove</button>
                    </div>
                @endif
            </div>

            <!-- Title -->
            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" value="{{ $sustainability->title }}" class="form-control" required>
            </div>

            <!-- Pillar Image -->
            <div class="mb-3">
                <label>Pillar Image</label>
                <input type="file" name="image" class="form-control mt-1">
                @if($sustainability->image)
                    <div class="mt-2 flex items-center gap-4" id="pillar-image-container">
                        <img src="{{ Storage::url($sustainability->image) }}" width="100" class="rounded">
                        <button type="button" class="btn btn-danger" id="remove-pillar-btn">Remove</button>
                    </div>
                @endif
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control">{{ $sustainability->description }}</textarea>
            </div>

            <button class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {

        const heroBtn = document.getElementById('remove-hero-btn');
        if (heroBtn) {
            heroBtn.addEventListener('click', function () {
                if (confirm('Are you sure you want to remove this hero image?')) {
                    fetch("{{ route('admin.sustainability.removeHero', $sustainability->id) }}", {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        }
                    }).then(res => res.json())
                        .then(data => {
                            if (data.success) {
                                document.getElementById('hero-image-container').remove();
                            }
                        });
                }
            });
        }

        const pillarBtn = document.getElementById('remove-pillar-btn');
        if (pillarBtn) {
            pillarBtn.addEventListener('click', function () {
                if (confirm('Are you sure you want to remove this pillar image?')) {
                    fetch("{{ route('admin.sustainability.removeImage', $sustainability->id) }}", {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        }
                    }).then(res => res.json())
                        .then(data => {
                            if (data.success) {
                                document.getElementById('pillar-image-container').remove();
                            }
                        });
                }
            });
        }

    });
</script>