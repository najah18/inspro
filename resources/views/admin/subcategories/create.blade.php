@extends('theme.default')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Add New Package</h2>

    <form action="{{ route('subcategories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- SubCategory Name -->
        <div class="form-group">
            <label for="name">Package Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Package name" required>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>The Package name is required and should be valid.</strong>
                </span>
            @enderror
        </div>

        <!-- SubCategory Description -->
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="5" placeholder="Enter description ">{{ old('description') }}</textarea>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>The description should be valid.</strong>
                </span>
            @enderror
        </div>

        <!-- SubCategory Photo -->
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

        <!-- Category Dropdown -->
        <div class="form-group">
            <label for="category_id">Select Service</label>
            <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
                <option value="" disabled selected>Select a Service</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <span class="invalid-feedback" role="alert">
                    <strong>A valid category must be selected.</strong>
                </span>
            @enderror
        </div>
            <!-- SubCategory Price -->
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" step="0.01" name="price" id="price" class="form-control @error('price') is-invalid @enderror" placeholder="Enter the price" required>
                @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>The price is required and should be a valid number.</strong>
                    </span>
                @enderror
            </div>


        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Add Package</button>
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
