@extends('theme.default')

@section('heading')
Show Services
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="text-center mb-4">Services</h1>
        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3"><i class="mx-2 fas fa-plus"></i>Add New Service</a>

        <table id="categories-table" class="table table-striped table-bordered text-center table-responsive" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Service Name</th>
                    <th>Description</th>
                    <th>Photo</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description ?? 'No description available' }}</td>
                        <td>
                            @if($category->photo)
                                <img src="{{ asset('storage/' . $category->photo) }}" alt="Category Photo" style="width: 50px; height: 50px;">
                            @else
                                No photo available
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('categories.show', $category->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info btn-sm">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <form method="POST" action="{{ route('categories.destroy', $category->id) }}" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                    <i class="fa fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
