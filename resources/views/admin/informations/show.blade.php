@extends('theme.default')

@section('heading')
    Information Details
@endsection

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Information Details</h2>

    <div class="row">
        <!-- Display Logo -->
        <div class="col-12 mb-3">
            <h5>Logo:</h5>
            @if($information->logo)
                <img src="{{ asset('storage/' . $information->logo) }}" alt="Logo" class="img-fluid" style="max-width: 200px;">
            @else
                <p>No logo available</p>
            @endif
        </div>

        <!-- Display Facebook Link -->
        <div class="col-12 mb-3">
            <h5>Facebook Link:</h5>
            <p><a href="{{ $information->facebook_link }}" target="_blank">{{ $information->facebook_link }}</a></p>
        </div>

        <!-- Display Instagram Link -->
        <div class="col-12 mb-3">
            <h5>Instagram Link:</h5>
            <p><a href="{{ $information->instagram_link }}" target="_blank">{{ $information->instagram_link }}</a></p>
        </div>

        <!-- Display TikTok Link -->
        <div class="col-12 mb-3">
            <h5>TikTok Link:</h5>
            <p><a href="{{ $information->tiktok_link }}" target="_blank">{{ $information->tiktok_link }}</a></p>
        </div>

        <!-- Display YouTube Link -->
        <div class="col-12 mb-3">
            <h5>YouTube Link:</h5>
            <p><a href="{{ $information->youtube_link }}" target="_blank">{{ $information->youtube_link }}</a></p>
        </div>

        <!-- Display LinkedIn Link -->
        <div class="col-12 mb-3">
            <h5>LinkedIn Link:</h5>
            <p><a href="{{ $information->linkedin_link }}" target="_blank">{{ $information->linkedin_link }}</a></p>
        </div>

        <!-- Display Threads Link -->
        <div class="col-12 mb-3">
            <h5>Threads Link:</h5>
            <p><a href="{{ $information->threads_link }}" target="_blank">{{ $information->threads_link }}</a></p>
        </div>

        <!-- Display Small Details -->
        <div class="col-12 mb-3">
            <h5>Small Details:</h5>
            <p>{{ $information->small_details }}</p>
        </div>

        <!-- Display Details -->
        <div class="col-12 mb-3">
            <h5>Details:</h5>
            <p>{{ $information->details }}</p>
        </div>

        <!-- Display Address 1 -->
        <div class="col-12 mb-3">
            <h5>Address 1:</h5>
            <p>{{ $information->address_1 }}</p>
        </div>

        <!-- Display Address 2 -->
        <div class="col-12 mb-3">
            <h5>Address 2:</h5>
            <p>{{ $information->address_2 }}</p>
        </div>

        <!-- Display Map Link -->
        <div class="col-12 mb-3">
            <h5>Map Link:</h5>
            <p><a href="{{ $information->map_link }}" target="_blank">{{ $information->map_link }}</a></p>
        </div>

        <!-- Display Phone Number -->
        <div class="col-12 mb-3">
            <h5>Phone Number:</h5>
            <p>{{ $information->phone_number }}</p>
        </div>

        <!-- Display WhatsApp Number -->
        <div class="col-12 mb-3">
            <h5>WhatsApp Number:</h5>
            <p>{{ $information->whatsapp_number }}</p>
        </div>

        <!-- Display Email -->
        <div class="col-12 mb-3">
            <h5>Email:</h5>
            <p>{{ $information->email }}</p>
        </div>

        <!-- Display Number of Videos -->
        <div class="col-12 mb-3">
            <h5>Number of Videos:</h5>
            <p>{{ $information->videos_nb }}</p>
        </div>

        <!-- Display Number of Photos -->
        <div class="col-12 mb-3">
            <h5>Number of Photos:</h5>
            <p>{{ $information->photos_nb }}</p>
        </div>

        <!-- Display Number of Contents -->
        <div class="col-12 mb-3">
            <h5>Number of Contents:</h5>
            <p>{{ $information->contents_nb }}</p>
        </div>

        <!-- Display Number of Websites -->
        <div class="col-12 mb-3">
            <h5>Number of Websites:</h5>
            <p>{{ $information->website_nb }}</p>
        </div>

        <!-- Display Work Link -->
        <div class="col-12 mb-3">
            <h5>Work Link:</h5>
            <p><a href="{{ $information->work_link }}" target="_blank">{{ $information->work_link }}</a></p>
        </div>
    </div>

    <!-- Buttons -->
    <div class="mt-3">
        <!-- Back Button -->
        <a href="{{ route('admin.informations.index') }}" class="btn btn-secondary">Back to List</a>

        <!-- Edit Button -->
        <a href="{{ route('admin.informations.edit', $information->id) }}" class="btn btn-warning">Edit Information</a>

        <!-- Delete Button -->
        <form action="{{ route('admin.informations.destroy', $information->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this data?')">Delete Information</button>
        </form>
    </div>
</div>
@endsection
