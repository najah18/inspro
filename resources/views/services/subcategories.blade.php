@extends('layouts.main')
@section('head')

@endsection

@section('content')
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
                        data-aos-delay="2000"   data-aos-duration="2000">
            </div>
        </div>
    </div>
</header> 
</section>

<!-- subcategories -->
<section>
<div class="container ourteam">
    <div class="text-center position-relative" style="margin-bottom: 3.5rem !important;">
        <h2 class="pb-2">{{ $category->name }}</h2>
    </div>
    @foreach ($subcategories as $index => $subcategory)
        <div class="row mb-3 {{ $index % 2 == 0 ? 'text-right' : 'text-left' }}" data-aos="flip-left">
            <div class="card mb-3 border-0" style="max-width: 600px; margin-right: {{ $index % 2 == 0 ? '0' : 'auto' }}; margin-left: {{ $index % 2 == 0 ? 'auto' : '0' }};">
                <div class="row no-gutters">
                    <!-- ترتيب الأعمدة بناءً على المحاذاة وزيادة عرض الـ div -->
                    <div class="col-md-2 order-md-{{ $index % 2 == 0 ? '1' : '2' }} d-flex justify-content-center align-items-center p-0">
                        <!-- إضافة فئة rounded لجعل الصورة مربعة مع حواف دائرية قليلاً -->
                        <picture class=" card-img img-fluid">
                        <source srcset="{{ $subcategory->getFirstMediaUrl('sub_categories', 'webp') }}" type="image/webp" style="width: 100%; max-width: 100px; height: auto;">
                        <img src="{{ $subcategory->getFirstMediaUrl('sub_categories') }}" alt="{{ $subcategory->name }}" class="card-img-top" loading="lazy" style="width: 100%; max-width: 100px; height: auto;">
                        </picture>
                    </div>
                    <div class="col-md-10 order-md-{{ $index % 2 == 0 ? '2' : '1' }}">
                        <div class="card-body">
                            <h6 class="card-title pb-2">{{ $subcategory->name }}</h6>
                            <p class="card-text truncate" style="max-height: 4.5em; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
    {{ $subcategory->description }}
</p>                            <!-- يمكنك إضافة رابط عند الحاجة -->
                            <a class="" href="{{ route('subcategories.show', $subcategory->id) }}">
                              <button class="btn-register mt-1">show more</button>
                            </a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    @endforeach
</div>
</section>
<!-- end subcategories -->
 


@endsection