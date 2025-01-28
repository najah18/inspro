@extends('theme.default')

@section('head')
<link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('heading')
Users Display
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <table id="users-table" class="table table-striped table-bordered text-left" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>User Type</th>
                    <th>Options</th>
                </tr>
            </thead>

             <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->isSupperAdmin() ? 'Super Admin' : ($user->isAdmin() ? 'Admin' : 'User') }}</td>
                        <td>
                            @if (auth()->user()->id !== $user->id) {{-- Check that the user is not the same --}}
                                <form class="ml-4 form-inline" method="POST" action="{{ route('users.update', $user) }}" style="display:inline-block">
                                    @method('patch')
                                    @csrf
                                    <select class="form-control form-control-sm" name="adminstration_level">
                                        <option selected disabled>Select Type</option>
                                        <option value="0">User</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Super Admin</option>
                                    </select>
                                    <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</button> 
                                </form>

                                <form method="POST" action="{{ route('users.destroy', $user) }}" style="display:inline-block">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i> Delete</button> 
                                </form>
                            @else
                                <div class="btn btn-secondary btn-sm disabled"><i class="fa fa-ban"></i> You cannot edit or delete yourself</div>
                            @endif
                        </td>
                    </tr>
                @endforeach
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

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
        $('#users-table').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/English.json" // استخدم الترجمة الإنجليزية
            }
        });
    });
</script>
@endsection
