<!-- edit.blade.php -->
@extends('theme.default')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4">Edit Category</h1>

    <form action="{{ route('admin.subscriber-categories.update', $subscriberCategory) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                   value="{{ old('name', $subscriberCategory->name) }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Current Image:</label>
            @if($subscriberCategory->photo)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $subscriberCategory->photo) }}" width="100" class="img-thumbnail">
                    <small class="form-text text-muted">Current image</small>
                </div>
            @endif

            <label>New Image:</laشbel>
            <input type="file" name="photo" id="photoInput" class="form-control-file @error('photo') is-invalid @enderror">
            @error('photo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            
            <!-- New image preview -->
            <div id="imagePreview" class="mt-2" style="display:none;">
                <img id="previewImage" src="#" alt="Preview" width="100" class="img-thumbnail">
                <small class="form-text text-muted">New selected image</small>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@section('scripts')
<script>
    // Image preview functionality
    document.getElementById('photoInput').addEventListener('change', function(e) {
        const reader = new FileReader();
        const preview = document.getElementById('previewImage');
        const previewContainer = document.getElementById('imagePreview');
        
        reader.onload = function(e) {
            preview.src = e.target.result;
            previewContainer.style.display = 'block';
        }
        
        if(this.files[0]) {
            reader.readAsDataURL(this.files[0]);
        }
    });
</script>
@endsection

@endsection