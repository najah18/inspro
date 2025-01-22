@extends('theme.default')

@section('heading')
    Information List
@endsection

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Information</h2>

    <!-- Check if information exists -->
    @if($information)
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>Logo</th>
                    <th>Facebook Link</th>
                    <th>Instagram Link</th>
                    <th>TikTok Link</th>
                    <th>Youtube Link</th>
                    <th>LinkedIn Link</th>
                    <th>Threads Link</th>
                    <th>Small Details</th>
                    <th>Details</th>
                    <th>Address 1</th>
                    <th>Address 2</th>
                    <th>Map Link</th>
                    <th>Phone Number</th>
                    <th>WhatsApp Number</th>
                    <th>Email</th>
                    <th>Videos</th>
                    <th>Photos</th>
                    <th>Contents</th>
                    <th>Website</th>
                    <th>Work Link</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        @if($information->logo)
                            <img src="{{ asset('storage/' . $information->logo) }}" alt="Logo" width="100">
                        @else
                            No Logo
                        @endif
                    </td>
                    <td>{{ $information->facebook_link }}</td>
                    <td>{{ $information->instagram_link }}</td>
                    <td>{{ $information->tiktok_link }}</td>
                    <td>{{ $information->youtube_link }}</td>
                    <td>{{ $information->linkedin_link }}</td>
                    <td>{{ $information->threads_link }}</td>
                    <td>{{ $information->small_details }}</td>
                    <td>{{ $information->details }}</td>
                    <td>{{ $information->address_1 }}</td>
                    <td>{{ $information->address_2 }}</td>
                    <td>{{ $information->map_link }}</td>
                    <td>{{ $information->phone_number }}</td>
                    <td>{{ $information->whatsapp_number }}</td>
                    <td>{{ $information->email }}</td>
                    <td>{{ $information->videos_nb }}</td>
                    <td>{{ $information->photos_nb }}</td>
                    <td>{{ $information->contents_nb }}</td>
                    <td>{{ $information->website_nb }}</td>
                    <td>{{ $information->work_link }}</td>
                    <td>
                        <!-- View Button -->
                        <a href="{{ route('admin.informations.show', $information->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('admin.informations.edit', $information->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.informations.destroy', $information->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Message if data is present -->
        <div class="alert alert-warning">
            You cannot add new details. Please edit or delete existing information.
        </div>

    @else
        <!-- If no data is available, show the Add Information button -->
        <div class="text-center">
            <a href="{{ route('admin.informations.create') }}" class="btn btn-primary">Add Information</a>
        </div>
    @endif
</div>
@endsection
