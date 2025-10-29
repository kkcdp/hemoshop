@extends('frontend.layouts.app')

@section('contents')
    @include('frontend.home.sections.hero-section')
    <!--End hero slider-->

    <!--Start category slider-->
    @include('frontend.home.sections.category-section')
    <!--End category slider-->

    <!--Start banners-->
    @include('frontend.home.sections.banner-section')
    <!--End banners-->

    <!--Products Tabs-->
    @include('frontend.home.sections.products-tab-section')
    <!--Products Tabs-->

    <!--Start banners section two (4banners)-->
    @include('frontend.home.sections.banner-section-two')
    <!--End banners section two (4banners)-->

    <!--Flash Sale (Best sales) section-->
    @include('frontend.home.sections.flash-sale-section')
    <!--End Flash Sale (Best sales) section-->

    <!-- new arrival start -->
    @include('frontend.home.sections.new-arrival-section')
    <!-- new arrival end -->

    <!--CTA section start-->
    <section class="wsus__ctg mt-40">
        <div class="container">
            <a href="#" class="wsus__ctg_area">
                <img src="assets/imgs/cta_bg.png" alt="cta" class="img-fluid w-100" />
            </a>
        </div>
    </section>
    <!--CTA section end-->

    <!-- special products start -->
    @include('frontend.home.sections.special-products-section')
    <!-- special products end -->

    <!--Start four columns product-->
    @include('frontend.home.sections.four-col-products-section')
    <!--End 4 columns-->
@endsection
