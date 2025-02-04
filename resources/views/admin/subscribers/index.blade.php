@extends('theme.default')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4">Subscribers</h1>

    {{-- عرض رسالة النجاح إذا كانت موجودة --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- زر لإنشاء مشترك جديد --}}
    <a href="{{ route('admin.subscribers.create') }}" class="btn btn-primary mb-3">Create New</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Photo</th>
                <th>Video</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subscribers as $subscriber)
            <tr>
                <td>{{ $subscriber->id }}</td>
                <td>{{ $subscriber->name }}</td>
                <td>{{ $subscriber->description }}</td>
                <td>
                    @if($subscriber->photo)
                        <img src="{{ asset('storage/' . $subscriber->photo) }}" width="100">
                    @endif
                </td>
                <td>
                    @if($subscriber->video)
                        <a href="{{ $subscriber->video }}" target="_blank">Watch Video</a>
                    @endif
                </td>
                <td>{{ $subscriber->category->name ?? 'No Category' }}</td>
                <td>
                    {{-- زر تعديل المشترك --}}
                    <a href="{{ route('admin.subscribers.edit', $subscriber) }}" class="btn btn-warning">Edit</a>

                    {{-- زر حذف المشترك --}}
                    <form action="{{ route('admin.subscribers.destroy', $subscriber) }}" method="POST" class="d-inline">
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
