@extends('theme.default')

@section('content')
<div class="container">
    <h2>Add Income</h2>

    <form action="{{ route('admin.incomes.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" required>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" name="date" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Upload Image</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
        </div>



        <button type="submit" class="btn btn-primary">Add Income</button>
    </form>
</div>
@endsection
