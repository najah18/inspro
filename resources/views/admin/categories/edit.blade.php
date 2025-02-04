@extends('theme.default')

@section('heading')
    Edit Category
@endsection

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Edit Category</h2>
    <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Name Field -->
        <div class="form-group mb-3">
            <label for="name">Name:</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $category->name) }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Description Field -->
        <div class="form-group mb-3">
            <label for="description">Description:</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" required>{{ old('description', $category->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Photo Field -->
        <div class="form-group mb-3">
            <label for="photo">Photo:</label>
            <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo" onchange="previewImage(event)">
            @error('photo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            @if($category->photo)
                <div class="mt-2">
                    <label>Current Photo:</label>
                    <img src="{{ asset('storage/' . $category->photo) }}" alt="Current Photo" width="100" class="img-fluid" id="current-photo">
                </div>
            @else
                <p>No current photo available.</p>
            @endif

            <!-- Image preview after upload -->
            <div id="image-preview" class="mt-2"></div>
        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>

<script>
    // Function to preview image after upload
    function previewImage(event) {
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function () {
            const imagePreview = document.getElementById('image-preview');
            imagePreview.innerHTML = `<img src="${reader.result}" width="100" class="img-fluid">`;

            // Hide the current image if a new one is uploaded
            const currentPhoto = document.getElementById('current-photo');
            if (currentPhoto) {
                currentPhoto.style.display = 'none';
            }
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection
