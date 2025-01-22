@extends('theme.default')

@section('heading')
    Add Information
@endsection

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Add Information</h2>
    <form action="{{ route('admin.informations.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Logo Field -->
        <div class="form-group mb-3">
            <label for="logo">Logo:</label>
            <input type="file" class="form-control" id="logo" name="logo">
        </div>

        <!-- Facebook Link -->
        <div class="form-group mb-3">
            <label for="facebook_link">Facebook Link:</label>
            <input type="url" class="form-control" id="facebook_link" name="facebook_link">
        </div>

        <!-- Instagram Link -->
        <div class="form-group mb-3">
            <label for="instagram_link">Instagram Link:</label>
            <input type="url" class="form-control" id="instagram_link" name="instagram_link">
        </div>

        <!-- TikTok Link -->
        <div class="form-group mb-3">
            <label for="tiktok_link">TikTok Link:</label>
            <input type="url" class="form-control" id="tiktok_link" name="tiktok_link">
        </div>

        <!-- Add the rest of the fields similarly -->
        <div class="form-group mb-3">
            <label for="youtube_link">YouTube Link:</label>
            <input type="url" class="form-control" id="youtube_link" name="youtube_link">
        </div>

        <div class="form-group mb-3">
            <label for="linkedin_link">LinkedIn Link:</label>
            <input type="url" class="form-control" id="linkedin_link" name="linkedin_link">
        </div>

        <div class="form-group mb-3">
            <label for="threads_link">Threads Link:</label>
            <input type="url" class="form-control" id="threads_link" name="threads_link">
        </div>

        <div class="form-group mb-3">
            <label for="small_details">Small Details:</label>
            <textarea class="form-control" id="small_details" name="small_details"></textarea>
        </div>

        <!-- More fields... -->

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
