@extends('theme.default')

@section('heading')
    Add New Employee
@endsection

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Add New Employee</h2>
    <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Name Field -->
        <div class="form-group mb-3">
            <label for="name">Name:</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Description Field -->
        <div class="form-group mb-3">
            <label for="description">Description:</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description') }}</textarea>
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
            <div id="photo-preview-container" class="mt-2" style="display:none;">
                <img id="photo-preview" src="#" alt="Selected Image" style="width: 150px; height: auto;">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Save Employee</button>
    </form>
</div>

@section('scripts')
    <script>
        function previewImage(event) {
            const previewContainer = document.getElementById('photo-preview-container');
            const previewImage = document.getElementById('photo-preview');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImage.src = e.target.result;
                    previewContainer.style.display = 'block'; // Show the preview container
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
@endsection
