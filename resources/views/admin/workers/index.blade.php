@extends('theme.default')
@section('head')
<link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection


@section('content')

<div class="container">
    <h2>Workers List</h2>
    <a href="{{ route('admin.workers.create') }}" class="btn btn-primary mb-3">Add New Worker</a>
    <a href="{{ route('admin.payments.index') }}" class="btn btn-success mb-3">View All Payments</a> <!-- زر View All Payments -->
    <div class="table-responsive">
    <table class="table table-striped table-bordered" id="workers-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Salary</th>
                <th>ID Image</th>
                <th>Contract</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($workers as $worker)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $worker->name }}</td>
                <td>{{ $worker->email }}</td>
                <td>{{ $worker->phone }}</td>
                <td>{{ $worker->salary }}</td>
                <td>
                    <a href="{{ asset('storage/' . $worker->identity_image) }}" target="_blank">View Image</a>
                </td>
                <td>
                    <a href="{{ asset('storage/' . $worker->contract_file) }}" target="_blank">View Contract</a>
                </td>
                <td class="w-100">
                    <a href="{{ route('admin.workers.edit', $worker->id) }}" class="btn btn-warning mb-2">Edit</a>
                    <form action="{{ route('admin.workers.destroy', $worker->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this worker?')">Delete</button>
                    </form>
                    <a href="{{ route('admin.workers.payments', $worker->id) }}" class="btn btn-info mt-2">View Payments</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection

@section('script')
<!-- Page level plugins -->
<script src="{{ asset('theme/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#workers-table').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/English.json" // استخدم الترجمة الإنجليزية
            }
        });
    });
</script>
@endsection