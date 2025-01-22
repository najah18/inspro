@extends('theme.default')

@section('heading')
    Show Category
@endsection

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Category Details</h2>
    <div class="card">
        <div class="card-header">
            <h3>{{ $category->name }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Description:</strong> {{ $category->description }}</p>
            <p><strong>Photo:</strong></p>
            @if ($category->photo)
                <img src="{{ asset('storage/' . $category->photo) }}" alt="Category Photo" width="200">
            @else
                <p>No photo available.</p>
            @endif
        </div>
    </div>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>
@endsection
