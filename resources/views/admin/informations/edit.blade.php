@extends('theme.default')

@section('heading')
    Edit Information
@endsection

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Edit Information</h2>
    <form action="{{ route('admin.informations.update', $information->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')


        <!-- Logo Field -->
        <div class="form-group mb-3">
            <label for="logo">Logo:</label>
            <input type="file" class="form-control" id="logo" name="logo" onchange="previewLogo(event)">

            @if($information->logo)
                <div class="mt-2">
                    <label>Current Logo:</label>
                    <img src="{{ asset('storage/' . $information->logo) }}" alt="Current Logo" width="100" class="img-fluid" id="current-logo">
                </div>
            @else
                <p>No current logo available.</p>
            @endif

            <!-- Image preview after upload -->
            <div id="logo-preview" class="mt-2"></div>
        </div>

        <!-- Facebook Link -->
        <div class="form-group mb-3">
            <label for="facebook_link">Facebook Link:</label>
            <input type="url" class="form-control" id="facebook_link" name="facebook_link" value="{{ old('facebook_link', $information->facebook_link) }}">
        </div>

        <!-- Instagram Link -->
        <div class="form-group mb-3">
            <label for="instagram_link">Instagram Link:</label>
            <input type="url" class="form-control" id="instagram_link" name="instagram_link" value="{{ old('instagram_link', $information->instagram_link) }}">
        </div>

        <!-- TikTok Link -->
        <div class="form-group mb-3">
            <label for="tiktok_link">TikTok Link:</label>
            <input type="url" class="form-control" id="tiktok_link" name="tiktok_link" value="{{ old('tiktok_link', $information->tiktok_link) }}">
        </div>

        <!-- Add the rest of the fields similarly -->
        <div class="form-group mb-3">
            <label for="youtube_link">YouTube Link:</label>
            <input type="url" class="form-control" id="youtube_link" name="youtube_link" value="{{ old('youtube_link', $information->youtube_link) }}">
        </div>

        <div class="form-group mb-3">
            <label for="linkedin_link">LinkedIn Link:</label>
            <input type="url" class="form-control" id="linkedin_link" name="linkedin_link" value="{{ old('linkedin_link', $information->linkedin_link) }}">
        </div>

        <div class="form-group mb-3">
            <label for="threads_link">Threads Link:</label>
            <input type="url" class="form-control" id="threads_link" name="threads_link" value="{{ old('threads_link', $information->threads_link) }}">
        </div>

        <div class="form-group mb-3">
            <label for="small_details">Small Details:</label>
            <textarea class="form-control" id="small_details" name="small_details">{{ old('small_details', $information->small_details) }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="details">Details:</label>
            <textarea class="form-control" id="details" name="details">{{ old('details', $information->details) }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="address_1">Address 1:</label>
            <input type="text" class="form-control" id="address_1" name="address_1" value="{{ old('address_1', $information->address_1) }}">
        </div>

        <div class="form-group mb-3">
            <label for="address_2">Address 2:</label>
            <input type="text" class="form-control" id="address_2" name="address_2" value="{{ old('address_2', $information->address_2) }}">
        </div>

        <div class="form-group mb-3">
            <label for="map_link">Map Link:</label>
            <input type="text" class="form-control" id="map_link" name="map_link" value="{{ old('map_link', $information->map_link) }}">
        </div>

        <div class="form-group mb-3">
            <label for="phone_number">Phone Number:</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number', $information->phone_number) }}">
        </div>

        <div class="form-group mb-3">
            <label for="whatsapp_number">WhatsApp Number:</label>
            <input type="text" class="form-control" id="whatsapp_number" name="whatsapp_number" value="{{ old('whatsapp_number', $information->whatsapp_number) }}">
        </div>

        <div class="form-group mb-3">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $information->email) }}">
        </div>

        <div class="form-group mb-3">
            <label for="videos_nb">Number of Videos:</label>
            <input type="number" class="form-control" id="videos_nb" name="videos_nb" value="{{ old('videos_nb', $information->videos_nb) }}">
        </div>

        <div class="form-group mb-3">
            <label for="photos_nb">Number of Photos:</label>
            <input type="number" class="form-control" id="photos_nb" name="photos_nb" value="{{ old('photos_nb', $information->photos_nb) }}">
        </div>

        <div class="form-group mb-3">
            <label for="contents_nb">Number of Contents:</label>
            <input type="number" class="form-control" id="contents_nb" name="contents_nb" value="{{ old('contents_nb', $information->contents_nb) }}">
        </div>

        <div class="form-group mb-3">
            <label for="website_nb">Number of Websites:</label>
            <input type="number" class="form-control" id="website_nb" name="website_nb" value="{{ old('website_nb', $information->website_nb) }}">
        </div>

        <div class="form-group mb-3">
            <label for="work_link">Work Link:</label>
            <input type="url" class="form-control" id="work_link" name="work_link" value="{{ old('work_link', $information->work_link) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Information</button>
    </form>
</div>

<script>
    // Function to preview logo after upload
    function previewLogo(event) {
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function () {
            const logoPreview = document.getElementById('logo-preview');
            logoPreview.innerHTML = `<img src="${reader.result}" width="100" class="img-fluid">`;

            // Hide the current logo if a new one is uploaded
            const currentLogo = document.getElementById('current-logo');
            if (currentLogo) {
                currentLogo.style.display = 'none';
            }
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>


@endsection
