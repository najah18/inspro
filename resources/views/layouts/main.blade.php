<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="google-site-verification" content="3izOAw8skXi7miijVXtcjTwqvTmNoyjutk8UqXWXzWY" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <!-- AOS Stylesheet -->
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">


  <!-- google fonts -->
  <!-- Google Fonts -->
  <link  rel="preload" href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link  rel="preload" href="https://fonts.googleapis.com/css2?family=Sora:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link  rel="preload" href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
  <link rel="preload" href="https://fonts.googleapis.com/css2?family=Epilogue:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">



  <link href="{{asset('css/style.css')}}" rel="stylesheet">

  <title>inspro production</title>
</head>

<body>

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      font-optical-sizing: auto;
      font-weight: 600;
      /* يمكنك تغييره حسب الحاجة */
      font-style: normal;
    }

    /* nav  */





    /* nav bar style  */

    .rolling-text {
      display: inline-block;
      overflow: hidden;
      height: 30px;
      line-height: 30px;
      cursor: pointer;
    }

    .rolling-text:hover .letter,
    .rolling-text.play .letter {
      transform: translateY(-100%);
    }

    .rolling-text .letter {
      display: inline-block;
      transition: transform 0.5s cubic-bezier(0.76, 0, 0.24, 1), -webkit-transform 0.5s cubic-bezier(0.76, 0, 0.24, 1);
    }


    .letter:nth-child(1) {
      transition-delay: 0s;
    }

    .letter:nth-child(2) {
      transition-delay: 0.015s;
    }

    .letter:nth-child(3) {
      transition-delay: 0.03s;
    }

    .letter:nth-child(4) {
      transition-delay: 0.045s;
    }

    .letter:nth-child(5) {
      transition-delay: 0.06s;
    }

    .letter:nth-child(6) {
      transition-delay: 0.075s;
    }

    .letter:nth-child(7) {
      transition-delay: 0.09s;
    }

    .letter:nth-child(8) {
      transition-delay: 0.105s;
    }

    .letter:nth-child(9) {
      transition-delay: 0.12s;
    }

    .letter:nth-child(10) {
      transition-delay: 0.13s;
    }

    .letter:nth-child(11) {
      transition-delay: 0.14s;
    }

    /* end nav style */
  </style>

  <div class="container-fluid">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-bottom fixed-top mb-4">
      <div class="container">
        <a href="{{ url('/') }}">
          <div style="height: 50px; width : 150px">
            <picture class="rounded-full">
              <source srcset="{{ $information->getFirstMediaUrl('logos', 'avif') }}" type="image/avif">
              <source srcset="{{ $information->getFirstMediaUrl('logos', 'webp') }}" type="image/webp">
              <img src="{{ $information->getFirstMediaUrl('logos') }}" alt="Logo" class="img-fluid" loading="lazy">
            </picture>
          </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ms-auto "> <!-- ms-auto لتحريك العناصر لليمين -->
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ url('/') }}">
                <div class="container">
                  <span class="rolling-text" data-text="Home"> </span>
                </div>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ route('favorites') }}">
                <div class="container">
                  <span class="rolling-text" data-text="Favorites"> </span>
                </div>
              </a>
            </li>
            <!--services  -->
            <div class="nav-item">
              <a class="nav-link" href="#">
                <span class="">
                  <div class="container">
                    <span class="rolling-text" data-text="Services"> </span>
                  </div>
                </span>
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
              <a class="nav-link" href="#ourteam">
                <div class="container">
                  <span class="rolling-text" data-text="Our Team"></span>
                </div>
              </a>
            </li>
            <!-- subscriber -->
            <div class="nav-item">
              <a class="nav-link" href="#">
                <span>
                  <div class="container">
                    <span class="rolling-text" data-text="Subscribers"> </span>
                  </div>
                </span>
              </a>
              <ul class="dropdown-menu">
                @foreach ($subscriberCategories as $subscriberCategory)
                <li class="nav-item">
                  <a class="dropdown-item has-submenu" href="#">{{ $subscriberCategory->name }}</a>
                  <ul class="dropdown-menu">
                    @foreach ($subscriberCategory->subscribers as $subscriber)
                    <li>
                      <!-- رابط لصفحة التفاصيل الخاصة بكل مشترك -->
                      <a class="dropdown-item" href="{{ route('subscribers.index', $subscriber->id) }}">
                        {{ $subscriber->name }}
                      </a>
                    </li>
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
                  <div class="container">
                    <span class="rolling-text" data-text="Articles"> </span>
                  </div>
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
    <footer class="footer">
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

  <Script defer>
    // تفعيل AOS
    AOS.init({ delay: 100 });
      </Script>

  <script defer>
    document.addEventListener("DOMContentLoaded", function() {
      // تحديد جميع العناصر التي تحتوي على النص
      const rollingTexts = document.querySelectorAll(".rolling-text");

      rollingTexts.forEach((rollingText) => {
        // الحصول على النص من السمة data-text
        const text = rollingText.getAttribute("data-text");

        // تقسيم النص إلى أحرف
        const letters = text.split("");
        const div1 = document.createElement("div");
        div1.classList.add("block");
        // إنشاء عناصر لكل حرف وإضافتها إلى DOM
        letters.forEach((letter, index) => {
          const span = document.createElement("span");
          span.classList.add("letter");
          span.innerText = letter;
          div1.appendChild(span);
        });

        // تكرار النص مرة أخرى لإنشاء التأثير
        const div2 = div1.cloneNode(true);

        rollingText.appendChild(div1);
        rollingText.appendChild(div2);
      });
    });
  </script>
  @yield('script')
</body>

</html>