@extends('theme.default')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Featured Services</h2>
    <a href="{{ route('admin.featured.create') }}" class="btn btn-primary mb-3">Add New Service</a>
    <div class="table-responsive">

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td style="width: 100px; height: auto;">
                    <picture class="rounded">
                                <source srcset="{{ $service->getFirstMediaUrl('featured_services', 'avif') }}" type="image/avif">
                                <source srcset="{{ $service->getFirstMediaUrl('featured_services', 'webp') }}" type="image/webp">
                                <img src="{{ $service->getFirstMediaUrl('featured_services') }}" alt="{{ $service->name }}" class="img-fluid" loading="lazy">
                            </picture>
                    </td>
                    <td>{{ $service->name }}</td>
                    <td>{{ number_format($service->price, 2) }}</td>
                    <td>
                        <a href="{{ route('admin.featured.edit', $service->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.featured.destroy', $service->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    </div>
</div>
@endsection