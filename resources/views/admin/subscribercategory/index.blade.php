<!-- index.blade.php -->
@extends('theme.default')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4">Subscriber Categories</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.subscriber-categories.create') }}" class="btn btn-primary mb-3">Create New</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    @if($category->photo)
                        <img src="{{ asset('storage/' . $category->photo) }}" width="100">
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.subscriber-categories.edit', $category) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.subscriber-categories.destroy', $category) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection