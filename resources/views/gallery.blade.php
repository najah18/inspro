@extends('layouts.main')
@section('head')

@endsection

@section('content')
<!-- CSS -->
<style>
    .truncate {
        display: -webkit-box;
        -webkit-line-clamp: 4; /* عرض 4 أسطر */
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis; /* إضافة النقاط (...) */
        height: 5.4em; /* تحديد ارتفاع العنصر بناءً على عدد الأسطر */
    }

    h6 {
    text-align: center; /* توسيط النص */
    margin-bottom: 15px; /* مسافة صغيرة بين النص والخط */
    position: relative;
    display: inline-block;
}

h6::after {
    content: '';
    position: absolute;
    bottom: -5px; /* ضبط المسافة بين النص والخط */
    left: 0;
    width: 100%;
    height: 3px;
    background: linear-gradient(to right, #22b6e1, #df2a83);
}






/* featured */
/* تنسيق الأزرار */
.btn-light {
    background-color: #f8f9fa; /* لون رمادي فاتح */
    border: 1px solid #ddd; /* إضافة حدود */
    z-index: 100; /* التأكد من ظهور الأزرار فوق المحتوى */
    opacity: 0.8; /* شفافية */
}

.btn-light:hover {
    opacity: 1; /* إزالة الشفافية عند التمرير */
}

/* تنسيق البطاقات */
#card-container {
    scroll-behavior: smooth; /* تمرير سلس */
    overflow-x: hidden; /* إخفاء التمرير الأفقي */
    display: flex;
    gap: 20px; /* إضافة مسافة بين البطاقات */
    padding: 0 20px; /* إضافة padding لتجنب قطع البطاقات */
}

.card-wrapper {
    box-sizing: border-box; /* تضمين الـ padding والـ border في العرض */
}

.image-container {
    text-align: center; /* توسيط الصورة */
}

/* تنسيق العنوان */
.text-center {
    text-align: center; /* توسيط النص أفقيًا */
}
</style>


<div class="splash-screen" id="splashScreen">
    <div class="splash-content">
        <h1 class="welcome-text">Welcome to Our Company</h1>
        <h2 class="company-name">Inspro Production</h2>
    </div>
</div>
<div class="container_fluid">
<!-- Page Header-->
 <section>
<header class="masthead curved-bottom" >
    <div class="container position-relative px-4 px-lg-5" 
    style="    margin-top: -50px;">
        <div class="row gx-4 gx-lg-5">
            <div class="col-md-8 col-lg-7 col-xl-6" style="margin-top: 4 rem;">
                <div class="site-heading" id="animated-text">
                    <h2 class="changh2" style="font-size: 50px;">Inspro Production</h2>
                    <span class="subheading subheading">{{$information->small_details}}</span>
                    <a href="">
                        <button class="btn-register mt-5">see more</button>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-lg-5 col-xl-6" >
                <img src="{{ url('images/bg.png') }}" alt="" class="header-image" style="width: 100%; height: auto;"  data-aos="fade-left" 
                        data-aos-delay="2000"   data-aos-duration="3000">
            </div>
        </div>
    </div>
</header> 
</section>



<!-- our servises -->
<!-- our services -->
@if($categories->isNotEmpty())
<section>
    <div class="container ourteam">
        <div class="text-center position-relative" style="margin-bottom: 3.5rem !important;">
            <h2 class="pb-2">Our Services</h2>
        </div>
        @foreach ($categories as $index => $category)
            <div class="row mb-3 {{ $index % 2 == 0 ? 'text-right' : 'text-left' }}" data-aos="flip-left">
                <div class="card mb-3 border-0" style="max-width: 600px; margin-right: {{ $index % 2 == 0 ? '0' : 'auto' }}; margin-left: {{ $index % 2 == 0 ? 'auto' : '0' }}">
                    <div class="row no-gutters">
                        <!-- ترتيب الأعمدة بناءً على المحاذاة وزيادة عرض الـ div -->
                        <div class="col-md-2 order-md-{{ $index % 2 == 0 ? '1' : '2' }} d-flex justify-content-center align-items-center p-0">
                            <!-- إضافة فئة rounded لجعل الصورة مربعة مع حواف دائرية قليلاً -->
                            <img src="{{ asset('storage/' . $category->photo) }}" class="card-img img-fluid" alt="..." style="width: 100%; max-width: 100px; height: auto;" />
                        </div>
                        <div class="col-md-10 order-md-{{ $index % 2 == 0 ? '2' : '1' }}">
                            <div class="card-body">
                                <h6 class="card-title pb-2">{{ $category->name }}</h6>
                                <p class="card-text truncate">{{ $category->description }}</p>
                                <a class="" href="{{ route('subcategories.index1', $category->id) }}">
                                    <button class="btn-register mt-1">See More</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endif

<!-- end our servises -->

<!-- featured services -->
@if(isset($services) && $services->count() > 0)
<section class="w-100 mt-4 mb-4">
    <div class="container position-relative">
        <!-- عنوان القسم -->
        <div class="text-center mb-4 ">
            <h2 class="pb-2 mb-4">Special Package</h2>
        </div>

        <!-- زر التمرير لليسار -->
        <button class="btn btn-light position-absolute start-0 top-50 translate-middle-y" style="z-index: 10;" onclick="scrollCards(-1)">
            &lt;
        </button>

        <!-- الصور في صف واحد مع التمرير -->
        <div class="row flex-nowrap overflow-hidden" id="card-container" style="scroll-behavior: smooth;">
            @foreach($services as $service)
            <div class="col-lg-3 col-md-4 col-6 mb-4 card-item">
            <div class="image-container" style="max-width: 80%; margin: 0 auto;">
    <img src="{{ asset('storage/' . $service->image) }}" 
         alt="{{ $service->name }}" 
         class="img-fluid rounded-4" 
         style="
             width: 100%; 
             height: auto; 
             
             box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3); /* ظل ثلاثي الأبعاد */
         ">
</div>

            </div>
            @endforeach
        </div>

        <!-- زر التمرير لليمين -->
        <button class="btn btn-light position-absolute end-0 top-50 translate-middle-y" style="z-index: 10;" onclick="scrollCards(1)">
            &gt;
        </button>
    </div>
</section>
@endif

<style>
    /* تأكد من أن الصور في صف واحد فقط */
    #card-container {
        display: flex;
        gap: 16px; /* زيادة المسافة بين الصور */
        overflow-x: auto;
    }

    /* الشاشات الكبيرة */
    @media (min-width: 1200px) {
        .card-item {
            flex: 0 0 calc(100% / 4); /* عرض 4 صور في الشاشات الكبيرة */
        }
    }

    /* الشاشات المتوسطة */
    @media (max-width: 1199px) and (min-width: 768px) {
        .card-item {
            flex: 0 0 calc(100% / 3); /* عرض 3 صور في الشاشات المتوسطة */
        }
    }

    /* الشاشات الصغيرة */
    @media (max-width: 767px) and (min-width: 576px) {
        .card-item {
            flex: 0 0 calc(100% / 2); /* عرض 2 صور في الشاشات الصغيرة */
        }
    }

    /* الهواتف الصغيرة */
    @media (max-width: 575px) {
        .card-item {
            flex: 0 0 100%; /* عرض صورة واحدة في الشاشات الصغيرة جداً */
        }
    }
</style>

<script>
    function scrollCards(direction) {
        const container = document.getElementById('card-container');
        const cardWidth = container.firstElementChild.offsetWidth + 16; // عرض العنصر الواحد مع المسافة بين الصور
        container.scrollBy({ left: direction * cardWidth, behavior: 'smooth' });
    }
</script>




<!-- end featured services -->

<!-- our team -->
 <section class="mb-4 " id="ourteam">
 <div class="container" data-aos="fade-up" >
    <div class="team-boxed">
        <div class="container">
            <div class="intro">
                <h2>Our Team</h2>
            </div>
            <div class="row people" >
                @foreach($employees as $employee)
                <div class="col-md-6 col-lg-4 item " data-aos="zoom-in" data-aos-duration="1200">
                    <div class="box">
                        <img src="{{asset('storage/' . $employee->photo)}}">
                        <p class="description text-truncate" id="description-{{$employee->id}}">
                            {{$employee->description}}
                        </p>
                        <button class="toggle-btn" data-id="{{$employee->id}}">Show more</button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>   
    </div>
    </section>
<!-- end  our team -->
 <!-- our Statistics -->
 <section class="statistics mr-0 ml-0 mt-6" id="statistics">
    <div class="overlay text-center">      
            <div class="row" style="width: 98%;">
              <div class="col-sm-6 col-md-3" data-aos="fade-up" data-aos-duration="1200" style="margin-bottom: 10%;">
                <i class="fas fa-laptop-house" style="font-size: 100px; color: #fff;"></i> <!-- أيقونة الموقع -->
                <div class="count" id="website">{{$information->website_nb}}</div>
                <span class="counter">Website</span>
              </div>
              <div class="col-sm-6 col-md-3 mt-1" data-aos="fade-up"  data-aos-duration="1200" style="margin-bottom: 10%;">
                <i class="fas fa-mobile-alt" style="font-size: 100px; color: #fff;"></i> <!-- أيقونة التطبيق -->
                <div class="count" id="Content-creator">{{$information->contents_nb}}</div>
                <span class="counter">Content creator</span>
              </div>
              <div class="col-sm-6 col-md-3" data-aos="fade-up"  data-aos-duration="1200" style="margin-bottom: 10%;">
                <i class="fas fa-image" style="font-size: 100px; color: #fff;"></i> <!-- أيقونة الصور -->
                <div class="count" id="Photos">{{$information->photos_nb}}</div>
                <span class="counter">Photos</span>
              </div>
              <div class="col-sm-6 col-md-3" data-aos="fade-up"  data-aos-duration="1200"  style="margin-bottom: 10%;">
                <i class="fas fa-video" style="font-size: 100px; color: #fff;"></i> <!-- أيقونة الفيديو -->
                <div class="count" id="Video-editing">{{$information->videos_nb}}</div>
                <span class="counter">Video editing</span>
              </div>
            </div>          
    </div>
 </section>
 <!--  -->
<!-- company address -->
<section class="contacts  text-center" id="contacts">
<div class="container">
    <div class="row ">
      <!-- خريطة الموقع -->
      <div class="col-md-6">
        <div class="map" data-aos="flip-right" data-aos-duration="3000">
          <iframe src="{{$information->map_link}}" width="600" height="450"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>

      <!-- عناوين الشركة -->
      <div class="col-md-6 pt-4 mt-2 text-left">
        <div class="contact-addresses" data-aos="flip-left" data-aos-duration="3000">
          <h4 class="team-heading underline">Company Address</h4>
          <ul>
            <li>
              <i class="fas fa-map-marker-alt"></i>
              <address>
                {{$information->address_1}}
              </address>
            </li>
            <li>
              <i class="fas fa-map-marker-alt"></i>
              <address>
                {{$information->address_2}}
              </address>
            </li>
          </ul>
        </div>
    </div>

    <!-- نص العمل معنا -->
    <div class="contact-text text-center" data-aos="fade-up" data-aos-duration="3000">
      <h3 class="team-heading underline">Work with Us</h3>
      <p class="mx-auto pt-4" style="margin-bottom: 3rem;">
        You can apply to work with us by clicking the button below.
      </p>
      <a href="{{$information->work_link}}" style="
        margin-top: 20px;
        padding: 13px 47px;
        background-color: #16aeca;
        color: #fff;
        font-size: 18px;
        border-radius: 30px;
        text-decoration: none;
        transition: all 0.5s ease;">
        click here
      </a>
    </div>
  </div>
</div>
</section>


      <!-- end adress -->






</div>















@endsection



@section('script')
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
    AOS.init();
});

document.addEventListener("DOMContentLoaded", function () {
    // احصل على النصوص الأصلية داخل الـ div
    const siteHeading = document.querySelector(".site-heading");
    const originalHtml = siteHeading.innerHTML;

    // أزل النصوص الأصلية مؤقتًا
    siteHeading.innerHTML = "";

    // تطبيق مكتبة Typed.js على النصوص
    new Typed("#animated-text", {
        strings: [originalHtml],
        typeSpeed: 1, // سرعة الكتابة
        startDelay: 0, // تأخير البداية
        showCursor: false, // إخفاء المؤشر الوامض
        onComplete: function () {
            // إعادة النصوص الأصلية عند الانتهاء
            siteHeading.innerHTML = originalHtml;
        },
    });
});



// splash screen
window.onload = function() {
    setTimeout(function() {
        // Hide the splash screen after 3 seconds
        document.getElementById('splashScreen').style.opacity = '0';
        
        // Remove splash screen from the DOM after transition
        setTimeout(function() {
            document.getElementById('splashScreen').style.display = 'none';
        }, 500); // Match the transition time of the splash screen
    }, 500); // Show splash screen for 3 seconds
};


// our team card
document.addEventListener('DOMContentLoaded', () => {
    const buttons = document.querySelectorAll('.toggle-btn'); // حدد جميع الأزرار

    buttons.forEach(button => {
        button.addEventListener('click', (e) => {
            const id = e.target.getAttribute('data-id'); // احصل على المعرّف من الزر
            const description = document.getElementById(`description-${id}`); // النص المقابل

            if (description) {
                if (description.classList.contains('full')) {
                    description.classList.remove('full');
                    button.innerText = 'Show more';
                } else {
                    description.classList.add('full');
                    button.innerText = 'Show less';
                }
            }
        });
    });
});


// statistic count 
// وظيفة العد التلقائي
function animateCounter(element, start, end, duration) {
  let startTime = null;

  function step(timestamp) {
    if (!startTime) startTime = timestamp;
    const progress = Math.min((timestamp - startTime) / duration, 1);
    element.innerText = Math.floor(progress * (end - start) + start);
    if (progress < 1) {
      window.requestAnimationFrame(step);
    }
  }

  window.requestAnimationFrame(step);
}

// تفعيل العداد عند رؤية القسم
document.addEventListener('DOMContentLoaded', () => {
  const statisticsSection = document.querySelector('#statistics');
  const observer = new IntersectionObserver(
    (entries) => {
      if (entries[0].isIntersecting) {
        document.querySelectorAll('.count').forEach((counter) => {
          const endValue = parseInt(counter.innerText, 10);
          animateCounter(counter, 0, endValue, 2000);
        });
        observer.disconnect(); // لمنع العد أكثر من مرة
      }
    },
    { threshold: 0.5 } // القسم يظهر بنسبة 50%
  );
  observer.observe(statisticsSection);
});





</script>

@endsection