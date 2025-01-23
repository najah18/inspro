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



<section>
    <div class="container-fluid ourteam">
        <div class="text-center position-relative mb-5">
            <h2 class="pb-2">{{ $subcategory->name }}</h2>
        </div>
        <div class="row justify-content-center mb-3" data-aos="flip-left">
            <div class="card border-0 col-12 col-md-10 col-lg-8">
                <div class="row no-gutters">
                    <!-- صورة في العمود الأول -->
                    <div class="col-md-5 d-flex justify-content-center align-items-center p-2">
                        <img src="{{asset ('storage/' . $subcategory->photo)}}" class="img-fluid" style="width: 100%; height: auto;" alt="..." />
                    </div>
                    <!-- تفاصيل البطاقة -->
                    <div class="col-md-7">
                        <div class="card-body">
                            <h6 class="card-title pb-2">{{ $subcategory->name }}</h6>
                            <p class="card-text">{{ $subcategory->description }}</p>
                            <h3 class="card-text">{{ $subcategory->price }} $</h3>
                                <!-- زر المفضلة -->

                                <button class="btn btn-outline-primary favorite-btn" 
                                subcategoryId="{{ $subcategory->id}}"    data-subcategory-id="{{ $subcategory->id }}" >
                                    <i class="fa fa-heart"></i> <span class="btn-text">add to favorite</span>
                                </button>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<div style="height: 50px;"></div>

@endsection
@section('script')
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    $('.favorite-btn').click(function(){
        let button = $(this); // حفظ الزر الذي تم النقر عليه
        let subcategory = button.attr('subcategoryId');
        let isFavorite = button.hasClass('added'); // التحقق من حالة المفضلة

        // تحديد الرابط المناسب بناءً على الحالة الحالية
        let url = isFavorite ? '/remove-wishlist/' + subcategory : '/add-wishlist/' + subcategory;

        $.ajax({
            method: 'get',
            url: url,
            success: function(response) {
                if (response.message) { 
                    if (isFavorite) {
                        // إذا كان في المفضلة وأردنا الحذف
                        button.html('<i class="fa fa-heart"></i> Add to Favorite');
                        button.removeClass('added'); // إزالة الفئة المضافة
                        alert('The item has been removed from your favorites.');
                    } else {
                        // إذا لم يكن في المفضلة وأردنا الإضافة
                        button.html('<i class="fa fa-check"></i> Added to Favorite');
                        button.addClass('added'); // إضافة فئة "added"
                        alert('The item has been added to your favorites.');
                    }
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


@endsection
