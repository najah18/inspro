@extends('theme.default')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Subcategory Details</h2>
    <div class="card">
        <div class="card-header">
            <h3>{{ $subcategory->name }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Description:</strong> {{ $subcategory->description }}</p>
            <p><strong>Category:</strong> {{ $subcategory->category->name ?? 'N/A' }}</p>
            <p><strong>Photo:</strong></p>
            @if ($subcategory->photo)
                <img src="{{ asset('storage/' . $subcategory->photo) }}" alt="{{ $subcategory->name }}" width="200">
            @else
                <p>No photo available.</p>
            @endif
        </div>
    </div>
    <a href="{{ route('subcategories.index') }}" class="btn btn-secondary mt-3">Back to List</a>
    <a href="{{ route('subcategories.edit', $subcategory->id) }}" class="btn btn-sm btn-info">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                           
                            <!-- زر الحذف -->
                            <a href="#" class="btn btn-danger" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this subcategory?')) document.getElementById('delete-form-{{ $subcategory->id }}').submit();">
                                Delete
                            </a>

                            <form id="delete-form-{{ $subcategory->id }}" action="{{ route('subcategories.destroy', $subcategory->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
</div>
@endsection
