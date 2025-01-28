@extends('theme.default')

@section('content')
<div class="container">
    <h1 class="mb-4">Add New Invoice Category</h1>

    <form action="{{ route('admin.invoicecategories.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="category_name" class="form-label">Category Name</label>
            <input type="text" name="category_name" id="category_name" class="form-control" placeholder="Enter category name" required>
        </div>

        <button type="submit" class="btn btn-primary">Save Category</button>
        <a href="{{ route('admin.invoicecategories.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
