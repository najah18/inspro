@extends('layouts.main')

@section('head')

@endsection

@section('content')

<!-- Favorite Items Page -->
<section>
    <div class="container-fluid ourteam">
        <div class="text-center position-relative mb-5">
            <h2 class="pb-2" style="margin-top: 100px;">Favorite Items</h2>
        </div>
        <div class="row justify-content-center mb-3" id="favorites-list">
            @forelse($favorites as $favorite)
            <div class="card border-0 col-12 col-md-10 col-lg-8 mb-3" data-favorite-id="{{ $favorite->id }}">
                <div class="row no-gutters">
                    <!-- Image in the first column -->
                    <div class="col-md-5 d-flex justify-content-center align-items-center p-2">
                        <img src="{{ asset('storage/' . $favorite->photo) }}" class="img-fluid" style="width: 100%; height: auto;" alt="..." />
                    </div>
                    <!-- Card details -->
                    <div class="col-md-7">
                        <div class="card-body">
                            <h6 class="card-title pb-2">{{ $favorite->name }}</h6>
                            <p class="card-text">{{ $favorite->description }}</p>

                            <!-- Remove from favorites button -->
                            <button class="btn btn-outline-danger remove-favorite-btn" data-favorite-id="{{ $favorite->id }}">
                                <i class="fa fa-heart-broken"></i> Remove from Favorite
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            @endforelse
        </div>
    </div>
</section>

@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    $('.remove-favorite-btn').click(function(){
        let button = $(this); // Keep reference to the button clicked
        let favoriteId = button.data('favorite-id'); // Get favorite item id

        $.ajax({
            method: 'GET',
            url: '/remove-wishlist/' + favoriteId,
            success: function(response) {
                if (response.message) {
                    // Remove the card element from the page
                    button.closest('.card').fadeOut(function() {
                        $(this).remove(); // Remove from DOM
                    });

                    // Show a success message
                    alert('Item has been successfully removed from your favorites!');
                } else if (response.error) {
                    alert(response.error);
                }
            },
            error: function(xhr, status, error) {
                alert('An error occurred while processing your request.');
            }
        });
    });
});
</script>
@endsection
