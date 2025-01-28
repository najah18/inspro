@extends('theme.default')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Invoice Category</h1>

    <form action="{{ route('admin.invoicecategories.update', $invoicecategory->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="category_name" class="form-label">Category Name</label>
            <input type="text" name="category_name" id="category_name" class="form-control" value="{{ $invoicecategory->category_name }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update Category</button>
        <a href="{{ route('admin.invoicecategories.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
