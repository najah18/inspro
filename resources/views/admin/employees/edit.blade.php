@extends('theme.default')

@section('heading')
    Edit Employee
@endsection

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Edit Employee</h2>
    <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Name Field -->
        <div class="form-group mb-3">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $employee->name }}" required>
        </div>

        <!-- Description Field -->
        <div class="form-group mb-3">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="4">{{ $employee->description }}</textarea>
        </div>

        <!-- Photo Field -->
        <div class="form-group mb-3">
            <label for="photo">Photo:</label>
            <input type="file" class="form-control" id="photo" name="photo" onchange="previewImage(event)">

            @if($employee->photo)
                <div class="mt-2">
                    <label>Current Photo:</label>
                    <img src="{{ asset('storage/' . $employee->photo) }}" alt="Current Photo" width="100" class="img-fluid" id="current-photo">
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
