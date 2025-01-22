@extends('theme.default')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Add New Category</h2>

    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Category Name -->
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter category name" required>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>The category name is required and should be valid.</strong>
                </span>
            @enderror
        </div>

        <!-- Category Description -->
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="5" placeholder="Enter description (optional)">{{ old('description') }}</textarea>

            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>The description should be valid.</strong>
                </span>
            @enderror
        </div>

        <!-- Category Photo -->
        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" name="photo" id="photo" class="form-control-file @error('photo') is-invalid @enderror" accept="image/*" onchange="previewImage(event)">
            <div class="mt-3">
                <img id="photo-preview" src="" alt="Image Preview" style="display: none; max-width: 200px; border: 1px solid #ddd; border-radius: 5px;">
            </div>
            @error('photo')
                <span class="invalid-feedback" role="alert">
                    <strong>The photo should be a valid image file.</strong>
                </span>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Add Category</button>
    </form>
</div>

<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('photo-preview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '';
            preview.style.display = 'none';
        }
    }
</script>
@endsection
