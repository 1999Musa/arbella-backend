@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Edit Factory</h1>

    <form action="{{ route('admin.factory.update', $factory->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Hero Image --}}
        <div class="mb-3">
            <label class="form-label">Hero Image</label>
            @if($factory->hero_image && file_exists(public_path('storage/' . $factory->hero_image)))
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $factory->hero_image) }}" alt="Hero Image" width="220" class="img-thumbnail">
                </div>
            @else
                <div class="mb-2 text-muted">No hero image uploaded</div>
            @endif
            <input type="file" name="hero_image" class="form-control">
        </div>

        {{-- Gallery --}}
        <div class="mb-3">
            <label class="form-label">Gallery Images</label>
            @if($factory->gallery && is_array($factory->gallery) && count($factory->gallery))
                <div class="mb-2 d-flex flex-wrap gap-2">
                    @foreach($factory->gallery as $idx => $img)
                        @if($img && file_exists(public_path('storage/' . $img)))
                            <div class="text-center me-2 mb-2">
                                <img src="{{ asset('storage/' . $img) }}" width="150" class="img-thumbnail mb-1">
                                <div>
                                    <label class="form-check-label">
                                        <input type="checkbox" name="remove_gallery[]" value="{{ $idx }}"> Remove
                                    </label>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @else
                <div class="mb-2 text-muted">No gallery images</div>
            @endif
            <input type="file" name="gallery[]" class="form-control" multiple>
        </div>

        {{-- Certificates --}}
        <div class="mb-3">
            <label class="form-label">Certificates</label>
            @if($factory->certificates && is_array($factory->certificates) && count($factory->certificates))
                <div class="mb-2 d-flex flex-wrap gap-2">
                    @foreach($factory->certificates as $idx => $img)
                        @if($img && file_exists(public_path('storage/' . $img)))
                            <div class="text-center me-2 mb-2">
                                <img src="{{ asset('storage/' . $img) }}" width="150" class="img-thumbnail mb-1">
                                <div>
                                    <label class="form-check-label">
                                        <input type="checkbox" name="remove_certificates[]" value="{{ $idx }}"> Remove
                                    </label>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @else
                <div class="mb-2 text-muted">No certificates</div>
            @endif
            <input type="file" name="certificates[]" class="form-control" multiple>
        </div>

        {{-- Clients --}}
        <div class="mb-3">
            <label class="form-label">Clients</label>
            @if($factory->clients && is_array($factory->clients) && count($factory->clients))
                <div class="mb-2 d-flex flex-wrap gap-2">
                    @foreach($factory->clients as $idx => $img)
                        @if($img && file_exists(public_path('storage/' . $img)))
                            <div class="text-center me-2 mb-2">
                                <img src="{{ asset('storage/' . $img) }}" width="150" class="img-thumbnail mb-1">
                                <div>
                                    <label class="form-check-label">
                                        <input type="checkbox" name="remove_clients[]" value="{{ $idx }}"> Remove
                                    </label>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @else
                <div class="mb-2 text-muted">No clients images</div>
            @endif
            <input type="file" name="clients[]" class="form-control" multiple>
        </div>

        <button type="submit" class="btn btn-primary">Update Factory</button>
    </form>
</div>
@endsection
