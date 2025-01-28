@extends('theme.default')

@section('content')
<div class="container">
    <h2>Edit Worker</h2>

    <form action="{{ route('admin.workers.update', $worker->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $worker->name) }}" required>
        </div>
        
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $worker->email) }}" required>
        </div>
        
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $worker->phone) }}" required>
        </div>
        
        <div class="mb-3">
            <label for="salary" class="form-label">Salary</label>
            <input type="number" class="form-control" id="salary" name="salary" value="{{ old('salary', $worker->salary) }}" required>
        </div>
        
        <div class="mb-3">
            <label for="identity_image" class="form-label">ID Image</label>
            <input type="file" class="form-control" id="identity_image" name="identity_image" accept="image/*">
            @if($worker->identity_image)
                <img src="{{ asset('storage/'.$worker->identity_image) }}" alt="ID Image" width="100">
            @endif
        </div>
        
        <div class="mb-3">
            <label for="contract_file" class="form-label">Contract PDF</label>
            <input type="file" class="form-control" id="contract_file" name="contract_file" accept=".pdf">
            @if($worker->contract_file)
                <a href="{{ asset('storage/'.$worker->contract_file) }}" target="_blank">Current Contract</a>
            @endif
        </div>
        
        <button type="submit" class="btn btn-primary">Update Worker</button>
    </form>
</div>
@endsection
