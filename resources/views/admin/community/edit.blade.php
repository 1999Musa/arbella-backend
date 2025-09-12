@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Edit Community Record</h1>
    <form action="{{ route('admin.community.update', $community->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        {{-- Hero Image --}}
        <div class="mb-3">
            <label>Hero Image</label>
            <input type="file" name="hero_image" class="form-control">
            @if($community->hero_image)
                <div class="mt-2">
                    <img src="{{ Storage::url($community->hero_image) }}" width="150" class="mb-2">
                    <button type="button" class="btn btn-sm btn-danger" onclick="removeHero({{ $community->id }}, this)">Remove</button>
                </div>
            @endif
        </div>

        {{-- Title --}}
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" value="{{ $community->title }}" class="form-control" required>
        </div>

        {{-- Collage Images --}}
        <div class="mb-3">
            <label>Collage Images</label>
            <input type="file" name="images[]" class="form-control" multiple>
            @if($community->images)
                <div class="mt-2 d-flex flex-wrap gap-2">
                    @foreach($community->images as $index => $img)
                        <div>
                            <img src="{{ Storage::url($img) }}" width="100" class="mb-1">
                            <button type="button" class="btn btn-sm btn-danger w-100" onclick="removeImage({{ $community->id }}, {{ $index }}, this)">Remove</button>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        {{-- Description --}}
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ $community->description }}</textarea>
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
</div>

<script>
    function removeHero(id, btn) {
        if(confirm('Are you sure to remove hero image?')){
            fetch(`/admin/community/${id}/remove-hero`, {
                method: 'DELETE',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
            })
            .then(res => res.json())
            .then(res => {
                if(res.success) btn.parentElement.remove();
            });
        }
    }

    function removeImage(id, index, btn) {
        if(confirm('Are you sure to remove this image?')){
            fetch(`/admin/community/${id}/remove-image/${index}`, {
                method: 'DELETE',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
            })
            .then(res => res.json())
            .then(res => {
                if(res.success) btn.parentElement.remove();
            });
        }
    }
</script>
@endsection
