@extends('theme.default')

@section('content')
<div class="container">
    <h2>Edit Income</h2>
    <form action="{{ route('admin.incomes.update', $income->id) }}" method="POST"  enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ $income->description }}" required>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $income->name }}" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $income->price }}" required>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ $income->date }}" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Upload New Image (optional)</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
        </div>


      

        <button type="submit" class="btn btn-primary">Update Income</button>
    </form>
</div>
@endsection
