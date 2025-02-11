@extends('theme.default')

@section('heading')
    Employees List
@endsection

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Employees</h2>
    <a href="{{ route('employees.create') }}" class="btn btn-success mb-3">Add New Employee</a>
    <table class="table table-bordered table-responsive">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Photo</th>  <!-- Added this column to show the image -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->description }}</td>
                    <td>
                        <div style="width: 100px; height :100px">
                    <picture class="rounded-full">
                        <source srcset="{{ $employee->getFirstMediaUrl('employees', 'avif') }}" type="image/avif">
                        <source srcset="{{ $employee->getFirstMediaUrl('employees', 'webp') }}" type="image/webp">
                        <img src="{{ $employee->getFirstMediaUrl('employees') }}" alt="{{ $employee->name }}" class="card-img-top" loading="lazy">
                    </picture>
                        </div>
                    </td>
                    <td>
                        <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-primary">View</a>
                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-info">Edit</a>
                        <form method="POST" action="{{ route('employees.destroy', $employee->id) }}" class="d-inline-block">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
