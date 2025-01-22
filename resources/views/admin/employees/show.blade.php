@extends('theme.default')

@section('heading')
    Employee Details
@endsection

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Employee Details</h2>
    <div class="card">
        <div class="card-header">
            <h4>{{ $employee->name }}</h4>
        </div>
        <div class="card-body">
            <p><strong>Description:</strong> {{ $employee->description ?? 'No description available' }}</p>

            @if ($employee->photo)
                <p><strong>Photo:</strong></p>
                <img src="{{ asset('storage/' . $employee->photo) }}" alt="Employee Photo" style="width: 200px; height: auto;">
            @else
                <p>No photo available</p>
            @endif
        </div>
        <div class="card-footer">
            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-info">Edit</a>
            <form method="POST" action="{{ route('employees.destroy', $employee->id) }}" class="d-inline-block">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
            </form>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
