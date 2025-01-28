@extends('theme.default')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Edit</h2>
    <form action="{{ route('admin.featured.update', $service->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name"> Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $service->name }}" required>
        </div>
        <div class="form-group">
            <label for="image"> Image:</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ $service->price }}" required>
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
    </form>
</div>
@endsection