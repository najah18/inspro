<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <!-- AOS Stylesheet -->
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <title>inspro production</title>
</head>
<body>



<div class="container-fluid">
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-bottom fixed-top mb-4">
    <div class="container">
      <a href="{{ url('/') }}">
      <img style="height: 50px; width : 150px" src="{{asset ('storage/' .  $information->logo)}}" alt="" >
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto"> <!-- ms-auto لتحريك العناصر لليمين -->
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ url('/') }}">   <i class="fas fa-home mx-1"></i> Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('favorites') }}">   <i class="fa fa-heart mx-1"></i>Favorites</a>
          </li>
          <!--services  -->
          <div class="nav-item">  
            <a class="nav-link" href="#">
            <span class=""><i class="fa-regular fa-folder-open mx-1"></i>   Services </span>
            </a>
            <ul class="dropdown-menu"> 
                  @foreach ($categories as $category)
                  <li class="nav-item">
                          <a class="dropdown-item has-submenu" href="{{ route('subcategories.index1', $category->id) }}">{{ $category->name }}</a>
                          <ul class=" dropdown-menu">
                              @foreach ($category->subcategories as $subcategory)
                              <li><a class="dropdown-item" href="{{ route('subcategories.show', $subcategory->id) }}">{{ $subcategory->name }}</a></li>
                              @endforeach
                          </ul>
                      </li>
                  @endforeach
              </ul>
          </div>
        <!-- our team -->
          <li class="nav-item">
            <a class="nav-link" href="#ourteam"> <i class="fas fa-users mx-2"></i>
            Our team</a>
          </li>
          <!--  subscriber-->
          <div class="nav-item">  
            <a class="nav-link" href="#">
            <span class="">
            <i class="fa-regular fa-address-book mx-1"></i>
            Subscribers
            </span>
            </a>
            <ul class="dropdown-menu">
            @foreach ($subscriberCategories as $subscriberCategory )
            <li class="nav-item">
              <a class="dropdown-item has-submenu" href="#">{{ $subscriberCategory->name }}</a>
              <ul class=" dropdown-menu">
                  @foreach ($subscriberCategory->subscribers as $subscriber)
                       <li><a class="dropdown-item" href="#">{{ $subscriber->name }}</a></li>
                   @endforeach
              </ul>

            </li>
            @endforeach
            </ul>
          </div>
          <!-- posts -->
          <div class="nav-item">  
            <a class="nav-link" href="#">
            <span class="">
            <i class="fa-regular fa-newspaper mx-1"></i>
            Articles
            </span>
            </a>
            <ul class="dropdown-menu">
            @foreach ($postCategories as $postCategory )
            <li class="nav-item">
              <a class="dropdown-item has-submenu" href="#">{{ $postCategory->name }}</a>
              <ul class=" dropdown-menu">
                  @foreach ($postCategory->posts as $post)
                       <li><a class="dropdown-item" href="#">{{ $post->name }}</a></li>
                   @endforeach
              </ul>

            </li>
            @endforeach
            </ul>
          </div>


          
        </ul>

        <!-- تسجيل الدخول والخروج -->
         <ul class="navbar-nav ms-auto">
         @guest
                            <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                            <button class="btn-register">{{ __('log in') }}</button>

                            </a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                              <button class="btn-register">{{ __('register') }}</button>
                            </a>
                            </li>
                            @endif
                            @else
                            <li class="nav-item dropdown">
                            <a id="navbarDropdown" class=" dropdown-toggle text-decoration-none text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                     {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end text-right">
                              @can('update-info')
                                <li><a href="{{ route('admin.index') }}" class="dropdown-item">admin controller</a></li>
                              @endcan
                                <li><a class="dropdown-item" href="{{ route('profile.show') }}">{{ __('my account') }}</a></li>
                                <li>
                                  <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('log out') }}
                                  </a>
                                </li>

                                <!-- نموذج تسجيل الخروج -->
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                                </form>
                                                                
                            </ul>
                            </li>
                            @endguest
            
         </ul>
      </div>
    </div>
  </nav>
<!-- end navbar -->

<a href="https://wa.me/{{$information->whatsapp_number}}" class="whatsapp-float" target="_blank">
    <img src="https://cdn-icons-png.flaticon.com/512/124/124034.png" alt="WhatsApp" class="whatsapp-icon">
</a>

<main>
  @yield('content')
</main>

<!-- footer -->
<footer class="footer" >
  <div class="top-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="about-us">
            <h5>about company</h5>
            <p>
              {{ $information->details ?? 'No details available.' }}
            </p>
            <ul class="list-inline">
              @if($information->instagram_link)
                <li class="list-inline-item">
                  <a href="{{ $information->instagram_link}}">
                    <i class="fab fa-instagram"></i>
                  </a>
                </li>
              @endif
              @if($information->youtube_link)
                <li class="list-inline-item">
                  <a href="{{ $information->youtube_link}}">
                    <i class="fab fa-youtube"></i>
                  </a>
                </li>
              @endif
              @if($information->facebook_link)
                <li class="list-inline-item">
                  <a href="{{ $information->facebook_link}}">
                    <i class="fab fa-facebook"></i>
                  </a>
                </li>
              @endif
              @if($information->linkedin_link)
                <li class="list-inline-item">
                  <a href="{{ $information->linkedin_link }}">
                    <i class="fab fa-linkedin"></i>
                  </a>
                </li>
              @endif
              @if($information->threads_link)
                <li class="list-inline-item">
                  <a href="{{ $information->threads_link }}">
                    <i class="fa-brands fa-threads"></i>
                  </a>
                </li>
              @endif
            </ul>
          </div>
        </div>
        <div class="col-md-6">
          <div class="contact-us">
            <h5>contact Us</h5>
            <ul class="contact-list">
              @if($information->address_1)
              <li>
                    <i class="fas fa-map-marker-alt"></i>
                    {{ $information->address_1 }}
                </li>
              @endif
              @if($information->whatsapp_number)
                  <li>
                    <i class="fa-brands fa-whatsapp"></i>
                    +{{ $information->whatsapp_number }}
                  </li>
              @endif
              @if($information->phone_number)
                <li>
                  <i class="fas fa-phone"></i>
                  {{ $information->phone_number }}
                </li>
              @endif
              @if($information->email)
                <li>
                  <i class="fas fa-envelope"></i>
                  {{ $information->email }}
                </li>
              @endif
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<!--end footer-->



</div>
<!--  -->





<!-- AOS JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<!-- jQuery (ضروري لعمل Bootstrap JS) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<Script>
  // تفعيل AOS
AOS.init();


</Script>
@yield('script')
</body>
</html>