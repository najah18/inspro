@extends('layouts.main')
@section('head')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Epilogue:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<link rel="canonical" href="https://www.insproproduction.com/">

@endsection

@section('content')
<!-- CSS -->
<style>
    body {
        font-family: 'Poppins', sans-serif;
        font-optical-sizing: auto;
        font-weight: 600;
        /* يمكنك تغييره حسب الحاجة */
        font-style: normal;
    }

    .truncate {
        display: -webkit-box;
        -webkit-line-clamp: 4;
        /* عرض 4 أسطر */
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        /* إضافة النقاط (...) */
        height: 5.4em;
        /* تحديد ارتفاع العنصر بناءً على عدد الأسطر */
    }

    h6 {
        text-align: center;
        /* توسيط النص */
        margin-bottom: 15px;
        /* مسافة صغيرة بين النص والخط */
        position: relative;
        display: inline-block;
    }

    h6::after {
        content: '';
        position: absolute;
        bottom: -5px;
        /* ضبط المسافة بين النص والخط */
        left: 0;
        width: 100%;
        height: 3px;
        background: linear-gradient(to right, #22b6e1, #df2a83);
    }






    /* featured */
    /* تنسيق الأزرار */
    .btn-light {
        background-color: #f8f9fa;
        /* لون رمادي فاتح */
        border: 1px solid #ddd;
        /* إضافة حدود */
        z-index: 100;
        /* التأكد من ظهور الأزرار فوق المحتوى */
        opacity: 0.8;
        /* شفافية */
    }

    .btn-light:hover {
        opacity: 1;
        /* إزالة الشفافية عند التمرير */
    }

    /* تنسيق البطاقات */
    #card-container {
        scroll-behavior: smooth;
        /* تمرير سلس */
        overflow-x: hidden;
        /* إخفاء التمرير الأفقي */
        display: flex;
        gap: 20px;
        /* إضافة مسافة بين البطاقات */
        padding: 0 20px;
        /* إضافة padding لتجنب قطع البطاقات */
    }

    .card-wrapper {
        box-sizing: border-box;
        /* تضمين الـ padding والـ border في العرض */
    }

    .image-container {
        text-align: center;
        /* توسيط الصورة */
    }

    /* تنسيق العنوان */
    .text-center {
        text-align: center;
        /* توسيط النص أفقيًا */
    }





    /* services card */
    /* تأثير الاهتزاز عند هوفر */
    .card:hover {
        animation: shake 0.5s ease-in-out;
    }

    /* تأثير الاهتزاز */
    @keyframes shake {
        0% {
            transform: translateX(0);
        }

        25% {
            transform: translateX(-5px);
        }

        50% {
            transform: translateX(5px);
        }

        75% {
            transform: translateX(-5px);
        }

        100% {
            transform: translateX(0);
        }
    }

    /* توسيط النص داخل البطاقات */
    .card-img-top {
        width: 100%;
        height: auto;
        object-fit: cover;
        border-radius: 12px;
    }


    /* تأكد من أن الصور في صف واحد فقط */
    #card-container {
        display: flex;
        gap: 16px;
        /* زيادة المسافة بين الصور */
        overflow-x: auto;
    }

    /* الشاشات الكبيرة */
    @media (min-width: 1200px) {
        .card-item {
            flex: 0 0 calc(100% / 4);
            /* عرض 4 صور في الشاشات الكبيرة */
        }
    }

    /* الشاشات المتوسطة */
    @media (max-width: 1199px) and (min-width: 768px) {
        .card-item {
            flex: 0 0 calc(100% / 3);
            /* عرض 3 صور في الشاشات المتوسطة */
        }
    }

    /* الشاشات الصغيرة */
    @media (max-width: 767px) and (min-width: 576px) {
        .card-item {
            flex: 0 0 calc(100% / 2);
            /* عرض 2 صور في الشاشات الصغيرة */
        }
    }

    /* الهواتف الصغيرة */
    @media (max-width: 575px) {
        .card-item {
            flex: 0 0 100%;
            /* عرض صورة واحدة في الشاشات الصغيرة جداً */
        }
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
        <header class="masthead curved-bottom">
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
                    <div class="col-md-4 col-lg-5 col-xl-6">
                        <img src="{{ url('images/bg.webp') }}" alt="" class="header-image" style="width: 100%; height: auto;" data-aos="fade-left"
                            data-aos-delay="1000" data-aos-duration="3000">
                    </div>
                </div>
            </div>
        </header>
    </section>



    <!-- our servises -->
    <!-- our services -->
    @if($categories->isNotEmpty())
    <section>
        <div class="container text-center my-5">
            <h2>Our Services</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 mt-4 mb-4">
                @foreach ($categories as $category)
                <div class="col">
                    <div class="card shadow-lg rounded-3">
                        <a href="{{ route('subcategories.index1', $category->id) }}">
                            <picture class="rounded-full">
                                <source srcset="{{ $category->getFirstMediaUrl('conversions', 'avif') }}" type="image/avif">
                                <source srcset="{{ $category->getFirstMediaUrl('conversions', 'webp') }}" type="image/webp">
                                <img src="{{ $category->getFirstMediaUrl('categories') }}" alt="{{ $category->name }}" class="card-img-top" loading="lazy">
                            </picture>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
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
                        <div style=" width: 100%; height: auto; box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3); " class="img-fluid rounded-4">
                            <picture class="rounded">
                                <source srcset="{{ $service->getFirstMediaUrl('featured_services', 'avif') }}" type="image/avif">
                                <source srcset="{{ $service->getFirstMediaUrl('featured_services', 'webp') }}" type="image/webp">
                                <img src="{{ $service->getFirstMediaUrl('featured_services') }}" alt="{{ $service->name }}" class="img-fluid rounded-4" loading="lazy" width="200" height="200">
                            </picture>
                        </div>
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





    <!-- end featured services -->

    <!-- our team -->
    <section class="mb-4 " id="ourteam">
        <div class="container" data-aos="fade-up">
            <div class="team-boxed">
                <div class="container">
                    <div class="intro">
                        <h2>Our Team</h2>
                    </div>
                    <div class="row people">
                        @foreach($employees as $employee)
                        <div class="col-md-6 col-lg-4 item " data-aos="zoom-in" data-aos-duration="1200">
                            <div class="box">
                                <picture class="rounded-full">
                                    <source srcset="{{ $employee->getFirstMediaUrl('employees', 'avif') }}" type="image/avif">
                                    <source srcset="{{ $employee->getFirstMediaUrl('employees', 'webp') }}" type="image/webp">
                                    <img src="{{ $employee->getFirstMediaUrl('employees') }}" alt="{{ $employee->name }}" class="card-img-top" loading="lazy" width="200" height="200">
                                </picture>
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
                <div class="col-sm-6 col-md-3 mt-1" data-aos="fade-up" data-aos-duration="1200" style="margin-bottom: 10%;">
                    <i class="fas fa-mobile-alt" style="font-size: 100px; color: #fff;"></i> <!-- أيقونة التطبيق -->
                    <div class="count" id="Content-creator">{{$information->contents_nb}}</div>
                    <span class="counter">Content creator</span>
                </div>
                <div class="col-sm-6 col-md-3" data-aos="fade-up" data-aos-duration="1200" style="margin-bottom: 10%;">
                    <i class="fas fa-image" style="font-size: 100px; color: #fff;"></i> <!-- أيقونة الصور -->
                    <div class="count" id="Photos">{{$information->photos_nb}}</div>
                    <span class="counter">Photos</span>
                </div>
                <div class="col-sm-6 col-md-3" data-aos="fade-up" data-aos-duration="1200" style="margin-bottom: 10%;">
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
                    <div class="map" data-aos="flip-right" data-aos-duration="3000" onclick="enableMap(this)">
                        <iframe
                            src="{{$information->map_link}}"
                            width="100%"
                            height="450"
                            style="border:0; pointer-events: none;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
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
<script defer>
    document.addEventListener("DOMContentLoaded", function() {
        // تشغيل AOS فقط للعناصر غير الأساسية
        AOS.init({
            once: true
        });

        // احصل على العنصر الأساسي (LCP) مباشرةً
        const siteHeading = document.querySelector(".site-heading");
        if (siteHeading) {
            const originalHtml = siteHeading.innerHTML;

            // أضف النص فورًا دون تأثير الكتابة
            siteHeading.innerHTML = originalHtml;
        }
    });

    // تحسين شاشة البداية لجعلها سريعة ولا تؤثر على LCP
    window.onload = function() {
        setTimeout(function() {
            const splashScreen = document.getElementById('splashScreen');
            if (splashScreen) {
                splashScreen.style.opacity = '0';
                setTimeout(() => {
                    splashScreen.style.display = 'none';
                }, 300); // تقليل التأخير ليصبح التحميل أسرع
            }
        }, 500); // تقليل وقت الشاشة إلى نصف ثانية فقط
    };

    // كود إظهار/إخفاء النصوص في قسم "الفريق"
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.toggle-btn').forEach(button => {
            button.addEventListener('click', (e) => {
                const id = e.target.getAttribute('data-id');
                const description = document.getElementById(`description-${id}`);
                if (description) {
                    description.classList.toggle('full');
                    button.innerText = description.classList.contains('full') ? 'Show less' : 'Show more';
                }
            });
        });
    });

    // تحسين وظيفة العدّاد في قسم الإحصائيات
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

    // تنفيذ العداد فقط عند ظهور القسم على الشاشة
    document.addEventListener('DOMContentLoaded', () => {
        const statisticsSection = document.querySelector('#statistics');
        if (statisticsSection) {
            const observer = new IntersectionObserver((entries) => {
                if (entries[0].isIntersecting) {
                    document.querySelectorAll('.count').forEach(counter => {
                        const endValue = parseInt(counter.innerText, 10);
                        animateCounter(counter, 0, endValue, 1500);
                    });
                    observer.disconnect(); // منع التكرار
                }
            }, {
                threshold: 0.5
            });
            observer.observe(statisticsSection);
        }
    });
</script>
<script defer>
    function scrollCards(direction) {
        const container = document.getElementById('card-container');
        const cardWidth = container.firstElementChild.offsetWidth + 16; // عرض العنصر الواحد مع المسافة بين الصور
        container.scrollBy({
            left: direction * cardWidth,
            behavior: 'smooth'
        });
    }
</script>

<script defer>
    function enableMap(mapDiv) {
        mapDiv.querySelector("iframe").style.pointerEvents = "auto";
    }
</script>

@endsection