@extends('theme.default')

@section('content')
<div class="container">
    <h2>Add New Worker</h2>

    <form action="{{ route('admin.workers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="mb-3">
            <label for="salary" class="form-label">Salary</label>
            <input type="number" class="form-control" id="salary" name="salary" required>
        </div>
        <div class="mb-3">
            <label for="identity_image" class="form-label">ID Image</label>
            <input type="file" class="form-control" id="identity_image" name="identity_image" accept="image/*" required>
        </div>
        <div class="mb-3">
            <label for="contract_file" class="form-label">Contract PDF</label>
            <input type="file" class="form-control" id="contract_file" name="contract_file" accept=".pdf" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Worker</button>
    </form>
</div>
@endsection
