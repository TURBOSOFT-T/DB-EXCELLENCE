@include('sweetalert::alert')


@php
    $config = DB::table('settings')->first();

@endphp
<!doctype html>
<html class="no-js" lang="zxx">

<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> @yield('titre') - SHOPPING</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ isset($post) && $post->seo_title ? $post->seo_title : config('app.name') }}</title>
    <meta name="description"
        content="{{ isset($post) && $post->meta_description ? $post->meta_description : __(config('app.description')) }}">
    <meta name="author" content="{{ isset($post) ? $post->user->name ?? ' ' : __(config('app.author')) }}">
    @if (isset($post) && $post->meta_keywords)
        <meta name="keywords" content="{{ $post->meta_keywords }}">
    @endif

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" src="{{ Storage::url($config->icon ?? '') }}" >

    <!-- CSS
 ============================================ -->
    <link rel="stylesheet" href="/assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/vendor/slick.css">
    <link rel="stylesheet" href="/assets/css/vendor/slick-theme.css">
    <link rel="stylesheet" href="/assets/css/plugins/sal.css">
    <link rel="stylesheet" href="/assets/css/plugins/feather.css">
    <link rel="stylesheet" href="/assets/css/plugins/fontawesome.min.css">
    <link rel="stylesheet" href="/assets/css/plugins/euclid-circulara.css">
    <link rel="stylesheet" href="/assets/css/plugins/swiper.css">
    <link rel="stylesheet" href="/assets/css/plugins/magnify.css">
    <link rel="stylesheet" href="/assets/css/plugins/odometer.css">
    <link rel="stylesheet" href="/assets/css/plugins/animation.css">
    <link rel="stylesheet" href="/assets/css/plugins/bootstrap-select.min.css">
    <link rel="stylesheet" href="/assets/css/plugins/jquery-ui.css">
    <link rel="stylesheet" href="/assets/css/plugins/magnigy-popup.min.css">
    <link rel="stylesheet" href="/assets/css/plugins/plyr.css">
    <link rel="stylesheet" href="/assets/css/style.css">



    
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/Script.js"></script>
    @livewireStyles
</head>

<body class="rbt-header-sticky">

    <!-- Start Header Area -->
    <header class="rbt-header rbt-header-9">
  

        <!-- Start Header Top -->
        <div class="rbt-header-middle position-relative rbt-header-mid-1  bg-color-white rbt-border-bottom">
            <div class="container">
                <div class="rbt-header-sec align-items-center ">

                    <div class="rbt-header-sec-col rbt-header-left">
                        <div class="rbt-header-content">
                            <!-- Start Header Information List  -->
                            <div class="header-info">
                                <ul class="rbt-dropdown-menu switcher-language">
                                    <li class="has-child-menu">
                                        <a href="#">
                                            <img class="left-image" src="assets/images/icons/en-us.png"
                                                alt="Language Images">
                                            <span class="menu-item">English</span>
                                            <i class="right-icon feather-chevron-down"></i>
                                        </a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href="#">
                                                    <img class="left-image" src="assets/images/icons/fr.png"
                                                        alt="Language Images">
                                                    <span class="menu-item">Français</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="left-image" src="assets/images/icons/de.png"
                                                        alt="Language Images">
                                                    <span class="menu-item">Deutsch</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Header Information List  -->

                          
                            <!-- End Header Information List  -->
                        </div>
                    </div>

                    <div class="rbt-header-sec-col rbt-header-center d-none d-md-block">
                        <div class="rbt-header-content">
                            <div class="header-info">
                                <div class="rbt-search-field">
                                    <div class="search-field">
                                        <input type="text" placeholder="Search Course">
                                        <button class="rbt-round-btn serach-btn" type="submit"><i
                                                class="feather-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="rbt-header-sec-col rbt-header-right">
                        <div class="rbt-header-content">
                            <div class="header-info">
                                <ul class="quick-access">
                                    <li>
                                        <a class="d-none d-xl-block rbt-cart-sidenav-activation" href="#"><i
                                                class="feather-shopping-cart"></i>Cart</a>
                                        <a class="d-block d-xl-none rbt-cart-sidenav-activation" href="#"><i
                                                class="feather-shopping-cart"></i></a>
                                    </li>
                                </ul>
                            </div>
                            @if(auth()->user())
                            <div class="header-info">
                                <ul class="quick-access">
                                    <li class="account-access rbt-user-wrapper right-align-dropdown d-none d-xl-block">
                                        <a href="#"><i class="feather-user"></i>Admin</a>
                                        <div class="rbt-user-menu-list-wrapper">
                                            <div class="inner">
                                                <div class="rbt-admin-profile">
                                                    <div class="admin-thumbnail">
                                                        <img src="assets/images/team/avatar.jpg" alt="User Images">
                                                    </div>
                                                    <div class="admin-info">
                                                        <span class="name">{{ Auth::user()->name }}</span>
                                                        <a class="rbt-btn-link color-primary" href="profile.html">View
                                                            Profile</a>
                                                    </div>
                                                </div>
                                                <ul class="user-list-wrapper">
                                                    <li>
                                                        <a  href="{{ url('account/dashboard') }}">
                                                            <i class="feather-home"></i>
                                                            <span>Mon compte</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a  href="{{ route('addresses') }}">
                                                            <i class="feather-home"></i>
                                                            <span>Mes adresses</span>
                                                        </a>
                                                      
                                                    </li>


                                                   
                                                
                                                  
                                                  
                                                </ul>
                                                <hr class="mt--10 mb--10">
                                             
                                               
                                                <ul class="user-list-wrapper">
                                                
                                                    <li>
                                                        <a href="index.html">
                                                            <i class="feather-log-out"></i>
                                                            <span>Déconnexion</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="access-icon rbt-user-wrapper right-align-dropdown d-block d-xl-none">
                                        <a class="rbt-round-btn" href="#"><i class="feather-user"></i></a>
                                        <div class="rbt-user-menu-list-wrapper">
                                            <div class="inner">
                                                <div class="rbt-admin-profile">
                                                    <div class="admin-thumbnail">
                                                        <img src="assets/images/team/avatar.jpg" alt="User Images">
                                                    </div>
                                                    <div class="admin-info">
                                                        <span class="name">Nipa Bali</span>
                                                        <a class="rbt-btn-link color-primary" href="profile.html">View
                                                            Profile</a>
                                                    </div>
                                                </div>
                                                <ul class="user-list-wrapper">
                                                    <li>
                                                        <a href="instructor-dashboard.html">
                                                            <i class="feather-home"></i>
                                                            <span>My Dashboard</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="feather-bookmark"></i>
                                                            <span>Bookmark</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="instructor-enrolled-courses.html">
                                                            <i class="feather-shopping-bag"></i>
                                                            <span>Enrolled Courses</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="instructor-wishlist.html">
                                                            <i class="feather-heart"></i>
                                                            <span>Wishlist</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="instructor-reviews.html">
                                                            <i class="feather-star"></i>
                                                            <span>Reviews</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="instructor-my-quiz-attempts.html">
                                                            <i class="feather-list"></i>
                                                            <span>My Quiz Attempts</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="instructor-order-history.html">
                                                            <i class="feather-clock"></i>
                                                            <span>Order History</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="instructor-quiz-attempts.html">
                                                            <i class="feather-message-square"></i>
                                                            <span>Question & Answer</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <hr class="mt--10 mb--10">
                                                <ul class="user-list-wrapper">
                                                    <li>
                                                        <a href="#">
                                                            <i class="feather-book-open"></i>
                                                            <span>Getting Started</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <hr class="mt--10 mb--10">
                                                <ul class="user-list-wrapper">
                                                    <li>
                                                        <a href="instructor-settings.html">
                                                            <i class="feather-settings"></i>
                                                            <span>Settings</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="index.html">
                                                            <i class="feather-log-out"></i>
                                                            <span>Logout</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            @endif

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- End Header Top -->

        <div class="rbt-header-wrapper  header-not-transparent header-sticky">
            <div class="container">
                <div class="mainbar-row rbt-navigation-end align-items-center">
                    <div class="header-left rbt-header-content">
                        <div class="header-info">
                            <div class="logo">
                                <a  href="{{ route('home') }}">
                                    <img src="{{ Storage::url($config->logo) }}"  alt="Education Logo Images">
                                </a>
                            </div>
                        </div>
                        <div class="header-info">
                            <div class="rbt-category-menu-wrapper">
                                <div class="rbt-category-btn rbt-side-offcanvas-activation">
                                    <div class="rbt-offcanvas-trigger md-size icon">
                                        <span class="d-none d-xl-block">
                                            <i class="feather-grid"></i>
                                        </span>
                                        <i title="Category" class="feather-grid d-block d-xl-none"></i>
                                    </div>
                                    <span class="category-text d-none d-xl-block">Category</span>
                                </div>

                                <div class="category-dropdown-menu d-none d-xl-block">
                                    <div class="category-menu-item">
                                        <div class="rbt-vertical-nav">
                                            <ul class="rbt-vertical-nav-list-wrapper vertical-nav-menu">
                                                <li class="vertical-nav-item active">
                                                    <a href="#tab1">Course School</a>
                                                </li>
                                                <li class="vertical-nav-item">
                                                    <a href="#tab2">Online School</a>
                                                </li>
                                                <li class="vertical-nav-item">
                                                    <a href="#tab3">kindergarten</a>
                                                </li>
                                                <li class="vertical-nav-item">
                                                    <a href="#tab4">Classic LMS</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="rbt-vertical-nav-content">
                                            <!-- Start One Item  -->
                                            <div class="rbt-vertical-inner tab-content" id="tab1"
                                                style="display: block">
                                                <div class="rbt-vertical-single">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-sm-6 col-6">
                                                            <div class="vartical-nav-content-menu">
                                                                <h3 class="rbt-short-title">Course Title</h3>
                                                                <ul class="rbt-vertical-nav-list-wrapper">
                                                                    <li><a href="#">Web Design</a></li>
                                                                    <li><a href="#">Art</a></li>
                                                                    <li><a href="#">Figma</a></li>
                                                                    <li><a href="#">Adobe</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-sm-6 col-6">
                                                            <div class="vartical-nav-content-menu">
                                                                <h3 class="rbt-short-title">Course Title</h3>
                                                                <ul class="rbt-vertical-nav-list-wrapper">
                                                                    <li><a href="#">Photo</a></li>
                                                                    <li><a href="#">English</a></li>
                                                                    <li><a href="#">Math</a></li>
                                                                    <li><a href="#">Read</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End One Item  -->

                                            <!-- Start One Item  -->
                                            <div class="rbt-vertical-inner tab-content" id="tab2">
                                                <div class="rbt-vertical-single">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="vartical-nav-content-menu">
                                                                <h3 class="rbt-short-title">Course Title</h3>
                                                                <ul class="rbt-vertical-nav-list-wrapper">
                                                                    <li><a href="#">Photo</a></li>
                                                                    <li><a href="#">English</a></li>
                                                                    <li><a href="#">Math</a></li>
                                                                    <li><a href="#">Read</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="vartical-nav-content-menu">
                                                                <h3 class="rbt-short-title">Course Title</h3>
                                                                <ul class="rbt-vertical-nav-list-wrapper">
                                                                    <li><a href="#">Web Design</a></li>
                                                                    <li><a href="#">Art</a></li>
                                                                    <li><a href="#">Figma</a></li>
                                                                    <li><a href="#">Adobe</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End One Item  -->

                                            <!-- Start One Item  -->
                                            <div class="rbt-vertical-inner tab-content" id="tab3">
                                                <div class="rbt-vertical-single">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="vartical-nav-content-menu">
                                                                <h3 class="rbt-short-title">Course Title</h3>
                                                                <ul class="rbt-vertical-nav-list-wrapper">
                                                                    <li><a href="#">Photo</a></li>
                                                                    <li><a href="#">English</a></li>
                                                                    <li><a href="#">Math</a></li>
                                                                </ul>
                                                                <div class="read-more-btn">
                                                                    <a class="rbt-btn-link" href="#">Learn
                                                                        More<i class="feather-arrow-right"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End One Item  -->

                                            <!-- Start One Item  -->
                                            <div class="rbt-vertical-inner tab-content" id="tab4">
                                                <div class="rbt-vertical-single">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="vartical-nav-content-menu">
                                                                <h3 class="rbt-short-title">Course Title</h3>
                                                                <ul class="rbt-vertical-nav-list-wrapper">
                                                                    <li><a href="#">Photo</a></li>
                                                                    <li><a href="#">English</a></li>
                                                                    <li><a href="#">Math</a></li>
                                                                    <li><a href="#">Read</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End One Item  -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="rbt-main-navigation d-none d-xl-block">
                        <nav class="mainmenu-nav">
                            <ul class="mainmenu">
                                <li class="with-megamenu has-menu-child-item position-static">
                                    <a  href="{{ route('home') }}">Accueil <i class="feather-chevron-down"></i></a>

                                </li>

                                <li><a  href="{{ route('shop') }}">Boutique</a></li>

                                <li><a href="{{ url('blog') }}">Actualités</a></li>


                                <li><a href="{{ url('contacts') }}">Contact</a></li>
                                

                                @guest

                                    <li class="current">
                                        <a href="{{ route('register') }}">Inscription</a>
                                    </li>

                                    <li>
                                        <a href="{{ url('login') }}">Connexion</a>
                                    </li>
                                @else
                                    @if (auth()->user()->role != 'user')
                                        <li><a href="{{ route('admin') }}" class="nav-item nav-link">Dashboard</a>
                                        </li>
                                    @endif



                                @endguest
                            </ul>
                        </nav>
                    </div>
                    <div class="header-right">
                        <div class="rbt-btn-wrapper d-none d-xl-block">
                            <a class="rbt-btn rbt-switch-btn btn-gradient btn-sm hover-transform-none" href="#">
                                <span data-text="Join Now">Join Now</span>
                            </a>
                        </div>
                        <!-- Start Mobile-Menu-Bar -->
                        <div class="mobile-menu-bar d-block d-xl-none">
                            <div class="hamberger">
                                <button class="hamberger-button rbt-round-btn">
                                    <i class="feather-menu"></i>
                                </button>
                            </div>
                        </div>
                        <!-- Start Mobile-Menu-Bar -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Start Side Vav -->
        <div class="rbt-offcanvas-side-menu rbt-category-sidemenu">
            <div class="inner-wrapper">
                <div class="inner-top">
                    <div class="inner-title">
                        <h4 class="title">Course Category</h4>
                    </div>
                    <div class="rbt-btn-close">
                        <button class="rbt-close-offcanvas rbt-round-btn"><i class="feather-x"></i></button>
                    </div>
                </div>
                <nav class="side-nav w-100">
                    <ul class="rbt-vertical-nav-list-wrapper vertical-nav-menu">
                        <li class="vertical-nav-item">
                            <a href="#">Course School</a>
                            <div class="vartical-nav-content-menu-wrapper">
                                <div class="vartical-nav-content-menu">
                                    <h3 class="rbt-short-title">Course Title</h3>
                                    <ul class="rbt-vertical-nav-list-wrapper">
                                        <li><a href="#">Web Design</a></li>
                                        <li><a href="#">Art</a></li>
                                        <li><a href="#">Figma</a></li>
                                        <li><a href="#">Adobe</a></li>
                                    </ul>
                                </div>
                                <div class="vartical-nav-content-menu">
                                    <h3 class="rbt-short-title">Course Title</h3>
                                    <ul class="rbt-vertical-nav-list-wrapper">
                                        <li><a href="#">Photo</a></li>
                                        <li><a href="#">English</a></li>
                                        <li><a href="#">Math</a></li>
                                        <li><a href="#">Read</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="vertical-nav-item">
                            <a href="#">Online School</a>
                            <div class="vartical-nav-content-menu-wrapper">
                                <div class="vartical-nav-content-menu">
                                    <h3 class="rbt-short-title">Course Title</h3>
                                    <ul class="rbt-vertical-nav-list-wrapper">
                                        <li><a href="#">Photo</a></li>
                                        <li><a href="#">English</a></li>
                                        <li><a href="#">Math</a></li>
                                        <li><a href="#">Read</a></li>
                                    </ul>
                                </div>
                                <div class="vartical-nav-content-menu">
                                    <h3 class="rbt-short-title">Course Title</h3>
                                    <ul class="rbt-vertical-nav-list-wrapper">
                                        <li><a href="#">Web Design</a></li>
                                        <li><a href="#">Art</a></li>
                                        <li><a href="#">Figma</a></li>
                                        <li><a href="#">Adobe</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="vertical-nav-item">
                            <a href="#">kindergarten</a>
                            <div class="vartical-nav-content-menu-wrapper">
                                <div class="vartical-nav-content-menu">
                                    <h3 class="rbt-short-title">Course Title</h3>
                                    <ul class="rbt-vertical-nav-list-wrapper">
                                        <li><a href="#">Photo</a></li>
                                        <li><a href="#">English</a></li>
                                        <li><a href="#">Math</a></li>
                                        <li><a href="#">Read</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="vertical-nav-item">
                            <a href="#">Classic LMS</a>
                            <div class="vartical-nav-content-menu-wrapper">
                                <div class="vartical-nav-content-menu">
                                    <h3 class="rbt-short-title">Course Title</h3>
                                    <ul class="rbt-vertical-nav-list-wrapper">
                                        <li><a href="#">Web Design</a></li>
                                        <li><a href="#">Art</a></li>
                                        <li><a href="#">Figma</a></li>
                                        <li><a href="#">Adobe</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="read-more-btn">
                        <div class="rbt-btn-wrapper mt--20">
                            <a class="rbt-btn btn-border-gradient radius-round btn-sm hover-transform-none w-100 justify-content-center text-center"
                                href="#">
                                <span>Learn More</span>
                            </a>
                        </div>
                    </div>
                </nav>
                <div class="rbt-offcanvas-footer">

                </div>
            </div>
        </div>
        <!-- End Side Vav -->
        <a class="rbt-close_side_menu" href="javascript:void(0);"></a>
    </header>
    <!-- Mobile Menu Section -->
    <div class="popup-mobile-menu">
        <div class="inner-wrapper">
            <div class="inner-top">
                <div class="content">
                    <div class="logo">
                        <a  href="{{ route('home') }}">
                            <img src="{{ Storage::url($config->logo) }}"  alt="Education Logo Images">
                        </a>
                    </div>
                    <div class="rbt-btn-close">
                        <button class="close-button rbt-round-btn"><i class="feather-x"></i></button>
                    </div>
                </div>
                <p class="description">{!! $config->description ?? ' '!!}</p>
                <ul class="navbar-top-left rbt-information-list justify-content-start">
                    <li><span>Téléphone:</span> <a
                        href="https://wa.me/{{ preg_replace('/\D/', '', $config->telephone) }}"
                        target="_blank">
                        {{ $config->telephone ?? '' }}
                        <i class="fab fa-whatsapp"></i>

                    </a></li>
                @if ($config->email)
                    <li>
                        <span>E-mail:</span>
                        <a href="mailto:{{ $config->email }}"
                            target="_blank">{{ $config->email }}</a>
                    </li>
                @endif
                </ul>
            </div>

            <nav class="mainmenu-nav">
                <ul class="mainmenu">
                    <li class="with-megamenu has-menu-child-item position-static">
                        <a  href="{{ route('home') }}">Accueil <i class="feather-chevron-down"></i></a>
                        <!-- Start Mega Menu  -->
                        <div class="rbt-megamenu menu-skin-dark">
                            <div class="wrapper">
                                <div class="row row--15 home-plesentation-wrapper single-dropdown-menu-presentation">

                                    <!-- Start Single Demo  -->
                                    <div
                                        class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="01-main-demo.html"><img
                                                            src="assets/images/splash/demo/h1.jpg"
                                                            alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="01-main-demo.html">Home Demo <span
                                                                class="btn-icon"><i
                                                                    class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div
                                        class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="12-marketplace.html"><img
                                                            src="assets/images/splash/demo/h12.jpg"
                                                            alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="12-marketplace.html">Marketplace <span
                                                                class="btn-icon"><i
                                                                    class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->
                                    <!-- Start Single Demo  -->
                                    <div
                                        class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="04-kindergarten.html"><img
                                                            src="assets/images/splash/demo/h4.jpg"
                                                            alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="04-kindergarten.html">kindergarten
                                                            <span class="btn-icon"><i
                                                                    class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->
                                    <!-- Start Single Demo  -->
                                    <div
                                        class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="13-university-classic.html"><img
                                                            src="assets/images/splash/demo/h13.jpg"
                                                            alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="13-university-classic.html">University
                                                            Classic <span class="btn-icon"><i
                                                                    class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div
                                        class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="14-home-elegant.html"><img
                                                            src="assets/images/splash/demo/h14.jpg"
                                                            alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="14-home-elegant.html">Home Elegant
                                                            <span class="btn-icon"><i
                                                                    class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div
                                        class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="09-gym-coaching.html"><img
                                                            src="assets/images/splash/demo/h9.jpg"
                                                            alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="09-gym-coaching.html">Gym Coaching
                                                            <span class="btn-icon"><i
                                                                    class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div
                                        class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="03-online-school.html"><img
                                                            src="assets/images/splash/demo/h3.jpg"
                                                            alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="03-online-school.html">Online School
                                                            <span class="btn-icon"><i
                                                                    class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div
                                        class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="06-university-status.html"><img
                                                            src="assets/images/splash/demo/h6.jpg"
                                                            alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="06-university-status.html">University
                                                            Status <span class="btn-icon"><i
                                                                    class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div
                                        class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="15-home-technology.html"><img
                                                            src="assets/images/splash/demo/h15.jpg"
                                                            alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="15-home-technology.html">Home
                                                            Technology <span class="btn-icon"><i
                                                                    class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div
                                        class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="07-instructor-portfolio.html"><img
                                                            src="assets/images/splash/demo/h7.jpg"
                                                            alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a
                                                            href="07-instructor-portfolio.html">Instructor Portfolio
                                                            <span class="btn-icon"><i
                                                                    class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div
                                        class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="08-language-academy.html"><img
                                                            src="assets/images/splash/demo/h8.jpg"
                                                            alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="08-language-academy.html">Language
                                                            Academy <span class="btn-icon"><i
                                                                    class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div
                                        class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="11-single-course.html"><img
                                                            src="assets/images/splash/demo/h11.jpg"
                                                            alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="11-single-course.html">Single Course
                                                            <span class="btn-icon"><i
                                                                    class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div
                                        class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="10-online-course.html"><img
                                                            src="assets/images/splash/demo/h10.jpg"
                                                            alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="10-online-course.html">Online Course
                                                            <span class="btn-icon"><i
                                                                    class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div
                                        class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="05-classic-lms.html"><img
                                                            src="assets/images/splash/demo/h5.jpg"
                                                            alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="05-classic-lms.html">Classic Lms <span
                                                                class="btn-icon"><i
                                                                    class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div
                                        class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="02-course-school.html"><img
                                                            src="assets/images/splash/demo/h2.jpg"
                                                            alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="02-course-school.html">Course School
                                                            <span class="btn-icon"><i
                                                                    class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div
                                        class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item coming-soon">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="#"><img
                                                            src="assets/images/splash/demo/coming-soon-1.png"
                                                            alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="#">Coming Soon <span
                                                                class="btn-icon"><i
                                                                    class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div
                                        class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item coming-soon">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="#"><img
                                                            src="assets/images/splash/demo/coming-soon-2.png"
                                                            alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="#">Coming Soon 2 <span
                                                                class="btn-icon"><i
                                                                    class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div
                                        class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item coming-soon">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="#"><img
                                                            src="assets/images/splash/demo/coming-soon-3.png"
                                                            alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="#">Coming Soon 3 <span
                                                                class="btn-icon"><i
                                                                    class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->
                                </div>

                                <div class="load-demo-btn text-center">
                                    <a class="rbt-btn-link color-white" href="#">Scroll to view more <svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-arrow-down-up" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5zm-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5z" />
                                        </svg></a>
                                </div>
                            </div>
                        </div>
                        <!-- End Mega Menu  -->
                    </li>

                   

                
                  
                    <li><a  href="{{ route('shop') }}">Boutique</a></li>
                    <li><a href="{{ url('blog') }}">Actualité</a></li>
                    <li><a href="{{ url('contacts') }}">Contact</a></li>
                    @guest

                        <li class="current">
                            <a href="{{ route('register') }}">Inscription</a>
                        </li>

                        <li>
                            <a href="{{ url('login') }}">Connexion</a>
                        </li>
                    @else
                        @if (auth()->user()->role != 'user')
                            <li><a href="{{ route('admin') }}" class="nav-item nav-link">Dashboard</a>
                            </li>
                        @endif



                    @endguest
                </ul>
            </nav>

            <div class="mobile-menu-bottom">
                <div class="rbt-btn-wrapper mb--20">
                    <a class="rbt-btn btn-border-gradient radius-round btn-sm hover-transform-none w-100 justify-content-center text-center"
                        href="#">
                        <span>Enroll Now</span>
                    </a>
                </div>

                <div class="social-share-wrapper">
                    <span class="rbt-short-title d-block">Find With Us</span>
                    <ul class="social-icon social-default transparent-with-border justify-content-start mt--20">
                        <li><a href="https://www.facebook.com/">
                                <i class="feather-facebook"></i>
                            </a>
                        </li>
                        <li><a href="https://www.twitter.com">
                                <i class="feather-twitter"></i>
                            </a>
                        </li>
                        <li><a href="https://www.instagram.com/">
                                <i class="feather-instagram"></i>
                            </a>
                        </li>
                        <li><a href="https://www.linkdin.com/">
                                <i class="feather-linkedin"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <!-- Start Side Vav -->
    <div class="rbt-cart-side-menu">
        <div class="inner-wrapper">
            <div class="inner-top">
                <div class="content">
                    <div class="title">
                        <h4 class="title mb--0">Your shopping cart</h4>
                    </div>
                    <div class="rbt-btn-close" id="btn_sideNavClose">
                        <button class="minicart-close-button rbt-round-btn"><i class="feather-x"></i></button>
                    </div>
                </div>
            </div>

         
            <nav class="side-nav w-100">
                <ul class="rbt-minicart-wrapper"  id="list_content_panier">
                    
                </ul>
            </nav>

            <div class="rbt-minicart-footer">
                <hr class="mb--0">
                <div class="rbt-cart-subttotal">
                    <p class="subtotal"><strong>Subtotal:</strong></p>
                    <p class="price"  id="montant_total_panier">00</p>
                </div>
                <hr class="mb--0">
                <div class="rbt-minicart-bottom mt--20">
                    <div class="view-cart-btn">
                        <a class="rbt-btn btn-border icon-hover w-100 text-center"  href="{{ route('cart') }}">
                            <span class="btn-text">Voir Panier</span>
                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                        </a>
                    </div>
                    <div class="checkout-btn mt--20">
                        <a class="rbt-btn btn-gradient icon-hover w-100 text-center" href="{{ url('/commander') }}">
                            <span class="btn-text">Commander</span>
                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <!-- End Side Vav -->
    <a class="close_side_menu" href="javascript:void(0);"></a>



    <main>



        @yield('body')




    </main>



    <div class="rbt-separator-mid">
        <div class="container">
            <hr class="rbt-separator m-0">
        </div>
    </div>


    <div class="whatsapp-float">
        <a href="https://wa.me/{{ preg_replace('/\D/', '', $config->telephone) }}" target="_blank">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>
    <!-- Start Footer aera -->
    <footer class="rbt-footer footer-style-1">
        <div class="footer-top">
            <div class="container">
                <div class="row row--15 mt_dec--30">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt--30">
                        <div class="footer-widget">
                            <div class="logo">
                                <a  href="{{ route('home') }}">
                                    <img   src="{{ Storage::url($config->logo) }}"  alt="Edu-cause">
                                </a>
                            </div>

                            <p class="description mt--20">
                                {!! $config->description ?? ' ' !!}
                            </p>

                         {{--    <div class="contact-btn mt--30">
                                <a class="rbt-btn hover-icon-reverse btn-border-gradient radius-round" href="#">
                                    <div class="icon-reverse-wrapper">
                                        <span class="btn-text">Contact With Us</span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    </div>
                                </a>
                            </div> --}}
                        </div>
                    </div>

                    <div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6 col-12 mt--30">
                        <div class="footer-widget">
                            <h5 class="ft-title">Nos liens</h5>
                            <ul class="ft-link">
                                <li><a href="#">Accueill</a></li>
                                        <li><a href="#">Shop</a></li>
                                        <li><a href="#">Contact</a></li>
                              
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 col-sm-6 col-12 mt--30">
                        <div class="footer-widget">
                            <h5 class="ft-title">Mon compte</h5>
                            <ul class="ft-link">
                                @if (Auth()->user())
                                <li><a href="#">Me paramètres</a></li>
                                <li><a href="#">Mes favoris</a></li>
                                <li><a href="#">Mon panier</a></li>
                                <li><a href="#">Mes commandes</a></li>
                            @else
                                <li class="current">
                                    <a href="{{ route('register') }}">Inscription</a>
                                </li>

                                <li>
                                    <a href="{{ url('login') }}">Connexion</a>
                                </li>
                            @endif

                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt--30">
                        <div class="footer-widget">
                            <h5 class="ft-title">Contact info</h5>
                            <ul class="ft-link">
                                <li><span>Téléphone:</span> <a
                                        href="https://wa.me/{{ preg_replace('/\D/', '', $config->telephone) }}"
                                        target="_blank">
                                        {{ $config->telephone ?? '' }}
                                        <i class="fab fa-whatsapp"></i>

                                    </a></li>
                                @if ($config->email)
                                    <li>
                                        <span>E-mail:</span>
                                        <a href="mailto:{{ $config->email }}"
                                            target="_blank">{{ $config->email }}</a>
                                    </li>
                                @endif
                                <li><span>Location:</span> {{ $config->addresse ?? ' ' }}</li>
                            </ul>
                            <ul class="social-icon social-default icon-naked justify-content-start mt--20">
                                <li>
                                    <a href="{{ $config->facebook ?? '' }}" target="_blank">
                                        <i class="feather-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ $config->instagram ?? '' }}" target="_blank">
                                        <i class="feather-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ $config->linkedin ?? '' }}" target="_blank">
                                        <i class="feather-linkedin"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ $config->tiktok ?? '' }}" target="_blank">
                                        <i class="feather-tiktok"></i>
                                    </a>
                                </li>
                            </ul>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer aera -->
    <div class="rbt-separator-mid">
        <div class="container">
            <hr class="rbt-separator m-0">
        </div>
    </div>
    <!-- Start Copyright Area  -->
    <div class="copyright-area copyright-style-1 ptb--20">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-12">
                    <p class="rbt-link-hover text-center text-lg-start">Copyright © {{ date('Y') }} <a
                            href="https://www.turbosoft-techno.com">TURBOSOFT.</a> All Rights Reserved</p>
                </div>

            </div>
        </div>
    </div>
    <!-- End Copyright Area  -->
    <div class="rbt-progress-parent">
        <svg class="rbt-back-circle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>



    <style>
        .whatsapp-float {
            position: fixed;
            bottom: 20px;
            /* Distance par rapport au bas */
            right: 20px;
            /* Distance par rapport à la droite */
            width: 60px;
            height: 60px;
            background-color: #25D366;
            /* Couleur verte WhatsApp */
            border-radius: 50%;
            /* Cercle */
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            z-index: 1000;
            /* Toujours visible au-dessus des autres éléments */
        }

        .whatsapp-float a {
            color: white;
            font-size: 30px;
            /* Taille de l'icône */
            text-decoration: none;
        }

        .whatsapp-float:hover {
            transform: scale(1.1);
            /* Effet zoom au survol */
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }
    </style>


    <!-- JS
============================================ -->
    <!-- Modernizer JS -->
    <script src="/assets/js/vendor/modernizr.min.js"></script>
    <!-- jQuery JS -->
    <script src="/assets/js/vendor/jquery.js"></script>
    <!-- Bootstrap JS -->
    <script src="/assets/js/vendor/bootstrap.min.js"></script>
    <!-- sal.js -->
    <script src="/assets/js/vendor/sal.js"></script>
    <script src="/assets/js/vendor/swiper.js"></script>
    <script src="/assets/js/vendor/magnify.min.js"></script>
    <script src="/assets/js/vendor/jquery-appear.js"></script>
    <script src="/assets/js/vendor/odometer.js"></script>
    <script src="/assets/js/vendor/backtotop.js"></script>
    <script src="/assets/js/vendor/isotop.js"></script>
    <script src="/assets/js/vendor/imageloaded.js"></script>

    <script src="/assets/js/vendor/wow.js"></script>
    <script src="/assets/js/vendor/waypoint.min.js"></script>
    <script src="/assets/js/vendor/easypie.js"></script>
    <script src="/assets/js/vendor/text-type.js"></script>
    <script src="/assets/js/vendor/jquery-one-page-nav.js"></script>
    <script src="/assets/js/vendor/bootstrap-select.min.js"></script>
    <script src="/assets/js/vendor/jquery-ui.js"></script>
    <script src="/assets/js/vendor/magnify-popup.min.js"></script>
    <script src="/assets/js/vendor/paralax-scroll.js"></script>
    <script src="/assets/js/vendor/paralax.min.js"></script>
    <script src="/assets/js/vendor/countdown.js"></script>
    <script src="/assets/js/vendor/plyr.js"></script>
    <!-- Main JS -->
    <script src="/assets/js/main.js"></script>
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 
    @livewireStyles
</body>

</html>
