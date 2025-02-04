@extends('theme.default')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4">Edit Subscriber</h1>

    {{-- عرض رسائل الأخطاء --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- نموذج التعديل --}}
    <form action="{{ route('admin.subscribers.update', $subscriber->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" 
                   value="{{ old('name', $subscriber->name) }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $subscriber->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="photo">Current Photo:</label>
            @if($subscriber->photo)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $subscriber->photo) }}" width="100" alt="Subscriber Photo" class="img-thumbnail">
                    <small class="form-text text-muted">Current image</small>
                </div>
            @endif
            <label for="photoInput">New Photo:</label>
            <input type="file" name="photo" id="photoInput" class="form-control-file @error('photo') is-invalid @enderror">
            @error('photo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="video">Video (YouTube URL):</label>
            <input type="url" name="video" id="video" class="form-control @error('video') is-invalid @enderror" 
                   value="{{ old('video', $subscriber->video) }}">
            @error('video')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="subscriber_category_id">Category:</label>
            <select name="subscriber_category_id" id="subscriber_category_id" class="form-control @error('subscriber_category_id') is-invalid @enderror" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $subscriber->subscriber_category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('subscriber_category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
