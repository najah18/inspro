@extends('layouts.main')
@section('head')
<title>Professional Portfolio</title>
@endsection

@section('content')
<style>
    body {
        background-color: #f8f9fa;
    }
    .profile-card {
        margin: 4rem 0;
        padding: 2rem;
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }
    .profile-img {
        border-radius: 12px;
        object-fit: cover;
        height: auto;
        width: 100%;
        max-width: 100%;
    }
    .name-title {
        color: #2c3e50;
        font-weight: 700;
        margin-bottom: 1.5rem;
    }
    .bio-text {
        max-height: 100px; 
        overflow: hidden;
        transition: max-height 0.3s ease-in-out;
    }
    .bio-text.expanded {
        max-height: 1000px;
    }
    .video-container {
        margin-bottom: 4rem;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    .btn-more {
        background: #2c3e50;
        color: white;
        padding: 0.5rem 2rem;
        border-radius: 25px;
        transition: all 0.3s ease;
    }
    .btn-more:hover {
        background: #34495e;
        transform: translateY(-2px);
    }
</style>

<div class="container" style="margin-top: 100px;">
    @foreach($subscribers as $subscriber)
    <div class="profile-card">
        <div class="row align-items-center">
            <div class="col-lg-4 text-center text-lg-start">
                <img src="{{ asset('storage/' . $subscriber->photo) }}" alt="{{ $subscriber->name }}" class="profile-img img-fluid">
            </div>
            <div class="col-lg-8 mt-4 mt-lg-0">
                <h1 class="name-title display-4 mb-4">{{ $subscriber->name }}</h1>
                <div class="bio-text" id="bioText{{ $subscriber->id }}">
                    <p>
                        {{ $subscriber->description }}
                    </p>
                </div>
                <div class="text-center mt-4">
                    <button class="btn btn-more" 
                            type="button" 
                            onclick="toggleBio({{ $subscriber->id }})">
                        Show More
                    </button>
                </div>
            </div>
        </div>
    </div>

    @if($subscriber->video)
    <div class="video-container">
        <div class="ratio ratio-16x9">
            <iframe src="https://www.youtube.com/embed/{{ parse_url($subscriber->video, PHP_URL_PATH) }}" 
                    class="rounded-3"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen></iframe>
        </div>
    </div>
    @endif
    @endforeach
</div>
@endsection

@section('script')
<script>
    function toggleBio(id) {
        const bioText = document.getElementById('bioText' + id);
        const button = document.querySelector(`button[onclick="toggleBio(${id})"]`);

        if (bioText.classList.contains('expanded')) {
            bioText.classList.remove('expanded');
            button.textContent = 'Show More';
        } else {
            bioText.classList.add('expanded');
            button.textContent = 'Show Less';
        }
    }
</script>
@endsection
