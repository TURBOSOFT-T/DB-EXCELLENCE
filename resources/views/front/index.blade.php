@extends('front.fixe')
@section('titre', 'Accueil')
@section('body')
    <main>

      

<!DOCTYPE html>
<html lang="en">


<body class="rbt-header-sticky">

 
    <!-- Start Banner Area -->
    <div class="rbt-banner-5 height-650 bg_image bg_image--19">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="inner text-start">
                        <h2 class="title"><span class="text-decoration-underline">Histudy</span> Starter is a community for creative people</h2>
                        <p class="description">We just don't give our student only lecture but real life
                            experience.</p>
                        <div class="slider-btn rbt-button-group justify-content-start">
                            <a class="rbt-btn btn-border icon-hover color-white radius-round" href="#">
                                <span class="btn-text">Explore Courses</span>
                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                            </a>
                            <a class="rbt-btn-link color-white" href="#">Start learning<i class="feather-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner Area -->


    <!-- Start category Area  -->
    <div class="rbt-category-area bg-color-white rbt-section-gapTop">
        <div class="container">
            <div class="row g-5">
                <!-- Start Category Box Layout  -->
                @foreach ($categories as $category)
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a class="rbt-cat-box rbt-cat-box-1 image-overlaping-content on-hover-content-visible" href="course-filter-one-toggle.html">
                        <div class="inner">
                            <div class="thumbnail">
                                <img src="assets/images/category/image/web-design.jpg" alt="Icons Images">
                            </div>
                            <div class="content">
                                <h5 class="title">{{$category->title ?? ''}}</h5>
                                <div class="read-more-btn">
                                    <span class="rbt-btn-link">15 Courses<i class="feather-arrow-right"></i></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
                <!-- End Category Box Layout  -->
             
            
                <!-- Start Category Box Layout  -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a class="rbt-cat-box rbt-cat-box-1 image-overlaping-content on-hover-content-visible" href="course-filter-one-toggle.html">
                        <div class="inner">
                            <div class="thumbnail">
                                <img src="assets/images/category/image/finance.jpg" alt="Icons Images">
                            </div>
                            <div class="content">
                                <h5 class="title">Finance & Accounting</h5>
                                <div class="read-more-btn">
                                    <span class="rbt-btn-link">15 Courses<i class="feather-arrow-right"></i></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- End Category Box Layout  -->
            </div>
        </div>
    </div>
    <!-- End category Area  -->

    <!-- Start Featured Course Area  -->
    <div class="rbt-featured-course bg-color-white rbt-section-gap">
        <div class="container">
            <div class="row g-5 align-items-end mb--60">
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="section-title text-start">
                        <h2 class="title">Featured Courses</h2>
                        <p class="description mt--20">Learning communicate to global world and build a bright future and career development, increase your skill with our histudy.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="load-more-btn text-start text-lg-end">
                        <a class="rbt-btn btn-border icon-hover radius-round" href="#">
                            <span class="btn-text">Browse Histudy Courses</span>
                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Start Card Area -->
            <div class="row g-5">
                <!-- Start Single Card  -->
                @foreach ($produits as $produit)
             
                <div class="col-lg-4 col-md-6 col-sm-12 col-12" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    <div class="rbt-card variation-01 rbt-hover">
                        <div class="rbt-card-img">
                            <a  href="{{ route('details-produits', ['id' => $produit->id, 'slug' => Str::slug(Str::limit($produit->name, 10))]) }}">
                                <img src="{{ asset('storage/photos/' . $produit->image) }}" alt="Card image">
                                <div class="rbt-badge-3 bg-white">
                                    <span>-40%</span>
                                    <span>Off</span>
                                </div>
                            </a>
                        </div>
                        <div class="rbt-card-body">
                            <div class="rbt-card-top">
                                <div class="rbt-review">
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span class="rating-count"> (15 Reviews)</span>
                                </div>
                                <div class="rbt-bookmark-btn">
                                    <a class="rbt-round-btn" title="Bookmark" href="#"><i
                                            class="feather-bookmark"></i></a>
                                </div>
                            </div>

                            <h4 class="rbt-card-title"><a
                                
                                 href="{{ route('details-produits', ['id' => $produit->id, 'slug' => Str::slug(Str::limit($produit->name, 10))]) }}"
                                >{{$produit->name ?? ''}}</a>
                            </h4>

                           

                        
                        
                            <div class="rbt-card-bottom">
                                <div class="rbt-price">
                                    <span class="current-price">$60</span>
                                    <span class="off-price">$120</span>
                                </div>
                                <a class="rbt-btn-link"  href="{{ route('details-produits', ['id' => $produit->id, 'slug' => Str::slug(Str::limit($produit->name, 10))]) }}">Voir détails
                                    <i class="feather-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- End Single Card  -->

         
          
            </div>
            <!-- End Card Area -->
        </div>
    </div>
    <!-- End Featured Course Area  -->


    <div class="rbt-counterup-area bg_image bg_image_fixed bg_image--20 ptb--170 bg-black-overlay" data-black-overlay="2">
        <div class="conter-style-2">
            <div class="container">
                <div class="row g-5">
                    <!-- Start Single Counter  -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 single-counter">
                        <div class="rbt-counterup style-2">
                            <div class="inner">
                                <div class="content">
                                    <h3 class="counter"><span class="odometer" data-count="500">00</span>
                                    </h3>
                                    <span class="subtitle">Learners &amp; counting</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Counter  -->

                    <!-- Start Single Counter  -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 single-counter">
                        <div class="rbt-counterup style-2">
                            <div class="inner">
                                <div class="content">
                                    <h3 class="counter"><span class="odometer" data-count="800">00</span>
                                    </h3>
                                    <span class="subtitle">Courses & Video</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Counter  -->

                    <!-- Start Single Counter  -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 single-counter">
                        <div class="rbt-counterup style-2">
                            <div class="inner">
                                <div class="content">
                                    <h3 class="counter"><span class="odometer" data-count="1000">00</span>
                                    </h3>
                                    <span class="subtitle">Certified Students</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Counter  -->

                    <!-- Start Single Counter  -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 single-counter">
                        <div class="rbt-counterup style-2">
                            <div class="inner">
                                <div class="content">
                                    <h3 class="counter"><span class="odometer" data-count="100">00</span>
                                    </h3>
                                    <span class="subtitle">Certified Students</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Counter  -->
                </div>
            </div>
        </div>
    </div>

    <div class="rbt-testimonial-area bg-color-extra2 rbt-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb--60">
                    <div class="section-title text-center">
                        <h2 class="title">Student's Feedback</h2>
                        <p class="description mt--20">Learning communicate to global world and build a bright future and career development, increase your skill with our histudy.</p>
                    </div>
                </div>
            </div>
            <div class="testimonial-item-3-activation swiper rbt-arrow-between gutter-swiper-30">
                <div class="swiper-wrapper">

                    <!-- Start Single Testimonial  -->
                    <div class="swiper-slide">
                        <div class="single-slide">
                            <div class="rbt-testimonial-box">
                                <div class="inner bg-no-shadow bg-color-primary-opacity">
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="assets/images/testimonial/client-01.png" alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">Martha Maldonado</h5>
                                            <span>Executive Chairman <i>@ Google</i></span>
                                        </div>
                                    </div>
                                    <div class="description">
                                        <p class="subtitle-3">After the launch, vulputate at sapien sit amet,
                                            auctor iaculis lorem. In vel hend rerit nisi. Vestibulum eget risus velit.</p>
                                        <div class="rating mt--20">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->

                    <!-- Start Single Testimonial  -->
                    <div class="swiper-slide">
                        <div class="single-slide">
                            <div class="rbt-testimonial-box">
                                <div class="inner bg-no-shadow bg-color-primary-opacity">
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="assets/images/testimonial/client-02.png" alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">Michael D. Lovelady</h5>
                                            <span>CEO <i>@ Google</i></span>
                                        </div>
                                    </div>
                                    <div class="description">
                                        <p class="subtitle-3">Histudy education, vulputate at sapien sit amet,
                                            auctor iaculis lorem. In vel hend rerit nisi. Vestibulum eget.</p>
                                        <div class="rating mt--20">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->

                    <!-- Start Single Testimonial  -->
                    <div class="swiper-slide">
                        <div class="single-slide">
                            <div class="rbt-testimonial-box">
                                <div class="inner bg-no-shadow bg-color-primary-opacity">
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="assets/images/testimonial/client-03.png" alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">Valerie J. Creasman</h5>
                                            <span>Executive Designer <i>@ Google</i></span>
                                        </div>
                                    </div>
                                    <div class="description">
                                        <p class="subtitle-3">Our educational, vulputate at sapien sit amet,
                                            auctor iaculis lorem. In vel hend rerit nisi. Vestibulum eget.</p>
                                        <div class="rating mt--20">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->

                    <!-- Start Single Testimonial  -->
                    <div class="swiper-slide">
                        <div class="single-slide">
                            <div class="rbt-testimonial-box">
                                <div class="inner bg-no-shadow bg-color-primary-opacity">
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="assets/images/testimonial/client-03.png" alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">Valerie J. Creasman</h5>
                                            <span>Executive Designer <i>@ Google</i></span>
                                        </div>
                                    </div>
                                    <div class="description">
                                        <p class="subtitle-3">Our educational, vulputate at sapien sit amet,
                                            auctor iaculis lorem. In vel hend rerit nisi. Vestibulum eget.</p>
                                        <div class="rating mt--20">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->

                    <!-- Start Single Testimonial  -->
                    <div class="swiper-slide">
                        <div class="single-slide">
                            <div class="rbt-testimonial-box">
                                <div class="inner bg-no-shadow bg-color-primary-opacity">
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="assets/images/testimonial/client-03.png" alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">Valerie J. Creasman</h5>
                                            <span>Executive Designer <i>@ Google</i></span>
                                        </div>
                                    </div>
                                    <div class="description">
                                        <p class="subtitle-3">Our educational, vulputate at sapien sit amet,
                                            auctor iaculis lorem. In vel hend rerit nisi. Vestibulum eget.</p>
                                        <div class="rating mt--20">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->
                </div>

                <div class="rbt-swiper-arrow rbt-arrow-left">
                    <div class="custom-overfolow">
                        <i class="rbt-icon feather-arrow-left"></i>
                        <i class="rbt-icon-top feather-arrow-left"></i>
                    </div>
                </div>

                <div class="rbt-swiper-arrow rbt-arrow-right">
                    <div class="custom-overfolow">
                        <i class="rbt-icon feather-arrow-right"></i>
                        <i class="rbt-icon-top feather-arrow-right"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Start Blog Style -->
    <div class="rbt-rbt-blog-area rbt-section-gapTop bg-gradient-8 rbt-round-bottom-shape">
        <div class="wrapper pb--50 rbt-index-upper">
            <div class="container">
                <div class="row g-5 align-items-end mb--60">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="section-title text-start">
                            <h2 class="title color-white">Les dernières avctualités</h2>
                          {{--   <p class="description color-white-off mt--20">Learning communicate to global world and build a bright future and career development, increase your skill with our histudy.</p>
                --}}         </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="load-more-btn text-start text-lg-end">
                            <a class="rbt-btn btn-border icon-hover radius-round color-white-off" href="{{ url('blog') }}">
                                <span class="btn-text">Voir tout</span>
                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Start Card Area -->
                <div class="row g-5">
                    <!-- Start Single Card  -->
                    @if ($posts->isEmpty())
                    <div class="alert alert-info">
                        <p>Aucune publication n'est disponible pour le moment.</p>
                    </div>
                @else
                @foreach($posts as $post)
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt--30" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    <div class="rbt-card variation-02 rbt-hover card-minimal">
                        <div class="rbt-card-body">
                            <ul class="meta-list justify-content-start mb--30">
                                <li class="list-item">
                                    <i class="feather-clock"></i>
                                    <span>{{$post->created_at}}</span>
                                </li>
                            </ul>
                            <h4 class="rbt-card-title"><a   href="{{ url('details-blog', ['id' => $post->id, 'slug' => Str::slug(Str::limit($post->title, 10))]) }}">{{$post->title}}</a></h4>
                            <div class="rbt-card-bottom mt--40">
                                <a class="transparent-button"  href="{{ url('details-blog', ['id' => $post->id, 'slug' => Str::slug(Str::limit($post->title, 10))]) }}">Voir détails<i><svg width="17" height="12" xmlns="http://www.w3.org/2000/svg"><g stroke="#27374D" fill="none" fill-rule="evenodd"><path d="M10.614 0l5.629 5.629-5.63 5.629"/><path stroke-linecap="square" d="M.663 5.572h14.594"/></g></svg></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
                    <!-- End Single Card  -->

                 
                </div>
                <!-- End Card Area -->
            </div>
        </div>
    </div>
    <!-- End Blog Style -->
    <!-- Start Newsletter Area  -->
    <div class="rbt-newsletter-area bg-color-white rbt-section-gapBottom pt--60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h2 class="title">Vous souhaitez bénéficier d'offres spéciales <br /> et  des promotions?</h2>
                        <form action="#" class="newsletter-form-1 mt--50 radius-round">
                            <input class="rbt-border" type="email" placeholder="Enter Your E-Email">
                            <button type="submit" class="rbt-btn btn-md btn-gradient hover-icon-reverse radius-round">
                                <span class="icon-reverse-wrapper">
                <span class="btn-text">Subscribe</span>
                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                </span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- End Newsletter Area  -->

   
   
</main>


@endsection
