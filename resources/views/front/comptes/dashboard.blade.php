@extends('front.fixe')
@section('titre', 'Blogs')
@section('body')

<head>
  <!-- Ajout dans le <head> pour le CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Ajout avant la fermeture de </body> pour le JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">


</head>

<main>
    @php
        $config = DB::table('settings')->first();
    @endphp

    <body>
        <a class="close_side_menu" href="javascript:void(0);"></a>
        <div class="rbt-page-banner-wrapper">
            <div class="rbt-banner-image"></div>
        </div>

        <div class="rbt-dashboard-area rbt-section-overlayping-top rbt-section-gapBottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="rbt-dashboard-content-wrapper">
                            <div class="tutor-bg-photo bg_image bg_image--22 height-350"></div>
                            <div class="rbt-tutor-information">
                                <div class="rbt-tutor-information-left">
                                    <div class="thumbnail rbt-avatars size-lg">
                                        <img src="assets/images/team/avatar.jpg" alt="Instructor">
                                    </div>
                                    <div class="tutor-content">
                                        <h5 class="title">John Due</h5>
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
                                    </div>
                                </div>
                                <div class="rbt-tutor-information-right">
                                    <div class="tutor-btn">
                                        <a class="rbt-btn btn-md hover-icon-reverse" href="create-course.html">
                                            <span class="icon-reverse-wrapper">
                                                <span class="btn-text">Create a New Course</span>
                                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row g-5">
                            <div class="col-lg-3">
                                <div class="rbt-default-sidebar sticky-top rbt-shadow-box rbt-gradient-border">
                                    <div class="inner">
                                        <div class="content-item-content">
                                            <div class="rbt-default-sidebar-wrapper">
                                                <div class="section-title mb--20">
                                                    <h6 class="rbt-title-style-2">Welcome, Jone Due</h6>
                                                </div>
                                                <nav class="mainmenu-nav">
                                                    <ul class="dashboard-mainmenu rbt-default-sidebar-list">
                                                        <li><a href="javascript:void(0);" data-target="#dashboard-section" class="sidebar-link"><i class="feather-home"></i><span>Tableau de bord</span></a></li>
                                                        <li><a href="javascript:void(0);" data-target="#profile-section" class="sidebar-link"><i class="feather-user"></i><span>Mon profile</span></a></li>
                                                        <li><a href="javascript:void(0);" data-target="#orders-section" class="sidebar-link"><i class="feather-shopping-bag"></i><span>Mes Commandes</span></a></li>
                                                        <li><a href="javascript:void(0);" data-target="#favorites-section" class="sidebar-link"><i class="feather-bookmark"></i><span>Mes favoris</span></a></li>
                                                        
                                                        <li><a href="javascript:void(0);" data-target="#reviews-section" class="sidebar-link"><i class="feather-star"></i><span>Reviews</span></a></li>
                                                        <li><a href="javascript:void(0);" data-target="#addresses-section" class="sidebar-link"><i class="feather-map-pin"></i><span>Mes Adresses</span></a></li>
      
                                                        <li><a href="javascript:void(0);" data-target="#settings-section" class="sidebar-link"><i class="feather-settings"></i><span>Paramètres</span></a></li>
                                                     
                                                        <li><a href="#"><i class="feather-log-out"></i><span>Déconnexion</span></a></li>
                                                    </ul>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-9">

                                <div id="dashboard-section" class="rbt-dashboard-content bg-color-white rbt-shadow-box mb--60 rbt-dashboard-table" style="display: none;">
                                    <div class="section-title">
                                        <h4 class="rbt-title-style-3">Dashboard</h4>
                                    </div> 

                                    <div class="row g-5">
                                      

                                        
                                       <!-- Nouvelle carte pour les commandes produits -->
                               <!-- Nouvelle carte pour les commandes produits avec l'icône panier et la couleur verte -->
<div class="col-lg-4 col-md-4 col-sm-6 col-12">
    <div class="rbt-counterup variation-01 rbt-hover-03 rbt-border-dashed bg-green-opacity">
        <div class="inner">
            <div class="rbt-round-icon bg-green-opacity">
                <i class="ri-shopping-bag-fill"></i>
            </div>
            <div class="content">
                <h3 class="counter without-icon color-green">
                    <span class="odometer" data-count="250">00</span>
                </h3>
                <span class="rbt-title-style-2 d-block">Total Commandes Produits</span>
            </div>
        </div>
    </div>
</div>

                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <div
                                                class="rbt-counterup variation-01 rbt-hover-03 rbt-border-dashed bg-coral-opacity">
                                                <div class="inner">
                                                    <div class="rbt-round-icon bg-coral-opacity">
                                                        <i class="feather-gift"></i>
                                                    </div>
                                                    <div class="content">
                                                        <h3 class="counter without-icon color-coral"><span
                                                                class="odometer" data-count="20">00</span>
                                                        </h3>
                                                        <span class="rbt-title-style-2 d-block">Total
                                                            Courses</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <div
                                                class="rbt-counterup variation-01 rbt-hover-03 rbt-border-dashed bg-warning-opacity">
                                                <div class="inner">
                                                    <div class="rbt-round-icon bg-warning-opacity">
                                                        <i class="feather-dollar-sign"></i>
                                                    </div>
                                                    <div class="content">
                                                        <h3 class="counter color-warning"><span class="odometer"
                                                                data-count="25000">00</span>
                                                        </h3>
                                                        <span class="rbt-title-style-2 d-block">Total
                                                            Earnings</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                
                                </div>


                                  <!-- Start Instructor Profile  -->
                                  <div id="profile-section" class="rbt-dashboard-content bg-color-white rbt-shadow-box mb--60 rbt-dashboard-table" style="display: none;">
                              
                                <div class="content">
                                    <div class="section-title">
                                        <h4 class="rbt-title-style-3">Informations Personnelles</h4>
                                    </div>
                                    <!-- Start Profile Row  -->
                                    <div class="rbt-profile-row row row--15">
                                        <div class="col-lg-4 col-md-4">
                                            <div class="rbt-profile-content b2">Date d'inscription</div>
                                        </div>
                                        <div class="col-lg-8 col-md-8">
                                            <div class="rbt-profile-content b2">{{$user->created_at ?? ''}}</div>
                                        </div>
                                    </div>
                                    <!-- End Profile Row  -->

                                    <!-- Start Profile Row  -->
                                    <div class="rbt-profile-row row row--15 mt--15">
                                        <div class="col-lg-4 col-md-4">
                                            <div class="rbt-profile-content b2">Nom</div>
                                        </div>
                                        <div class="col-lg-8 col-md-8">
                                            <div class="rbt-profile-content b2"> {{$user->name ?? ''}}</div>
                                        </div>
                                    </div>
                                    <!-- End Profile Row  -->

                                    <!-- Start Profile Row  -->
                                    <div class="rbt-profile-row row row--15 mt--15">
                                        <div class="col-lg-4 col-md-4">
                                            <div class="rbt-profile-content b2">Prénom</div>
                                        </div>
                                        <div class="col-lg-8 col-md-8">
                                            <div class="rbt-profile-content b2">{{$user->lastName ?? ''}}</div>
                                        </div>
                                    </div>
                                    <!-- End Profile Row  -->

                                 
                                    <!-- End Profile Row  -->

                                    <!-- Start Profile Row  -->
                                    <div class="rbt-profile-row row row--15 mt--15">
                                        <div class="col-lg-4 col-md-4">
                                            <div class="rbt-profile-content b2">Email</div>
                                        </div>
                                        <div class="col-lg-8 col-md-8">
                                            <div class="rbt-profile-content b2">{{$user->email ?? ''}}</div>
                                        </div>
                                    </div>
                                    <!-- End Profile Row  -->

                                    <!-- Start Profile Row  -->
                                    <div class="rbt-profile-row row row--15 mt--15">
                                        <div class="col-lg-4 col-md-4">
                                            <div class="rbt-profile-content b2">Téléphone</div>
                                        </div>
                                        <div class="col-lg-8 col-md-8">
                                            <div class="rbt-profile-content b2">{{$user->phone ?? ''}}</div>
                                        </div>
                                    </div>
                                    <!-- End Profile Row  -->

                                    <!-- Start Profile Row  -->
                                    <div class="rbt-profile-row row row--15 mt--15">
                                        <div class="col-lg-4 col-md-4">
                                            <div class="rbt-profile-content b2">Skill/Occupation</div>
                                        </div>
                                        <div class="col-lg-8 col-md-8">
                                            <div class="rbt-profile-content b2">Application Developer</div>
                                        </div>
                                    </div>
                                    <!-- End Profile Row  -->

                                    <!-- Start Profile Row  -->
                                    <div class="rbt-profile-row row row--15 mt--15">
                                        <div class="col-lg-4 col-md-4">
                                            <div class="rbt-profile-content b2">Biography</div>
                                        </div>
                                        <div class="col-lg-8 col-md-8">
                                            <div class="rbt-profile-content b2">I'm the Front-End Developer for #Rainbow IT in Bangladesh, OR. I have serious passion for UI effects, animations and creating intuitive, dynamic user experiences.</div>
                                        </div>
                                    </div>
                                    <!-- End Profile Row  -->
                                </div>
                            </div>
                            <!-- End Instructor Profile  -->
                        
                                <div id="orders-section" class="rbt-dashboard-content bg-color-white rbt-shadow-box mb--60 rbt-dashboard-table" style="display: none;">
                                    <div class="section-title">
                                        <h4 class="rbt-title-style-3">Mes commandes</h4>
                                    </div>
                                    <table class="rbt-table table table-borderless">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Course Name</th>
                                                <th>Date</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <th>#5478</th>
                                                <td>App Development</td>
                                                <td>January 27, 2023</td>
                                                <td>$100.99</td>
                                                <td><span class="rbt-badge-5 bg-color-success-opacity color-success">Success</span></td>
                                            </tr>
                                            <tr>
                                                <th>#4585</th>
                                                <td>Graphic</td>
                                                <td>May 27, 2023</td>
                                                <td>$200.99</td>
                                                <td><span class="rbt-badge-5 bg-primary-opacity">Processing</span></td>
                                            </tr>
                                            <tr>
                                                <th>#9656</th>
                                                <td>Graphic</td>
                                                <td>March 27, 2023</td>
                                                <td>$200.99</td>
                                                <td><span class="rbt-badge-5 bg-color-warning-opacity color-warning">On Hold</span></td>
                                            </tr>
                                            <tr>
                                                <th>#2045</th>
                                                <td>Application</td>
                                                <td>March 27, 2023</td>
                                                <td>$200.99</td>
                                                <td><span class="rbt-badge-5 bg-color-danger-opacity color-danger">Canceled</span></td>
                                            </tr>
                                            <tr>
                                                <th>#5478</th>
                                                <td>App Development</td>
                                                <td>January 27, 2023</td>
                                                <td>$100.99</td>
                                                <td><span class="rbt-badge-5 bg-color-success-opacity color-success">Success</span></td>
                                            </tr>
                                            <tr>
                                                <th>#4585</th>
                                                <td>Graphic</td>
                                                <td>May 27, 2023</td>
                                                <td>$200.99</td>
                                                <td><span class="rbt-badge-5 bg-primary-opacity">Processing</span></td>
                                            </tr>
                                            <tr>
                                                <th>#9656</th>
                                                <td>Graphic</td>
                                                <td>March 27, 2023</td>
                                                <td>$200.99</td>
                                                <td><span class="rbt-badge-5 bg-color-warning-opacity color-warning">On Hold</span></td>
                                            </tr>
                                            <tr>
                                                <th>#2045</th>
                                                <td>Application</td>
                                                <td>March 27, 2023</td>
                                                <td>$200.99</td>
                                                <td><span class="rbt-badge-5 bg-color-danger-opacity color-danger">Canceled</span></td>
                                            </tr>
                                            <tr>
                                                <th>#5478</th>
                                                <td>App Development</td>
                                                <td>January 27, 2023</td>
                                                <td>$100.99</td>
                                                <td><span class="rbt-badge-5 bg-color-success-opacity color-success">Success</span></td>
                                            </tr>
                                            <tr>
                                                <th>#4585</th>
                                                <td>Graphic</td>
                                                <td>May 27, 2023</td>
                                                <td>$200.99</td>
                                                <td><span class="rbt-badge-5 bg-primary-opacity">Processing</span></td>
                                            </tr>
                                            <tr>
                                                <th>#9656</th>
                                                <td>Graphic</td>
                                                <td>March 27, 2023</td>
                                                <td>$200.99</td>
                                                <td><span class="rbt-badge-5 bg-color-warning-opacity color-warning">On Hold</span></td>
                                            </tr>
                                            <tr>
                                                <th>#2045</th>
                                                <td>Application</td>
                                                <td>March 27, 2023</td>
                                                <td>$200.99</td>
                                                <td><span class="rbt-badge-5 bg-color-danger-opacity color-danger">Canceled</span></td>
                                            </tr>
                                            <tr>
                                                <th>#5478</th>
                                                <td>App Development</td>
                                                <td>January 27, 2023</td>
                                                <td>$100.99</td>
                                                <td><span class="rbt-badge-5 bg-color-success-opacity color-success">Success</span></td>
                                            </tr>
                                            <tr>
                                                <th>#4585</th>
                                                <td>Graphic</td>
                                                <td>May 27, 2023</td>
                                                <td>$200.99</td>
                                                <td><span class="rbt-badge-5 bg-primary-opacity">Processing</span></td>
                                            </tr>
                                            <tr>
                                                <th>#9656</th>
                                                <td>Graphic</td>
                                                <td>March 27, 2023</td>
                                                <td>$200.99</td>
                                                <td><span class="rbt-badge-5 bg-color-warning-opacity color-warning">On Hold</span></td>
                                            </tr>
                                            <tr>
                                                <th>#2045</th>
                                                <td>Application</td>
                                                <td>March 27, 2023</td>
                                                <td>$200.99</td>
                                                <td><span class="rbt-badge-5 bg-color-danger-opacity color-danger">Canceled</span></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>

                                <div id="favorites-section" class="rbt-dashboard-content bg-color-white rbt-shadow-box mb--60 rbt-dashboard-table" style="display: none;">
                                    <div class="section-title">
                                        <h4 class="rbt-title-style-3">Mes favoris</h4>
                                    </div>

                                    <div class="row g-5">
                                        <!-- Start Single Course  -->
                                        <div class="col-lg-4 col-md-6 col-12">
                                            <div class="rbt-card variation-01 rbt-hover">
                                                <div class="rbt-card-img">
                                                    <a href="course-details.html">
                                                        <img src="assets/images/course/course-online-01.jpg" alt="Card image">
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
                                                            <a class="rbt-round-btn" title="Bookmark" href="#"><i class="feather-bookmark"></i></a>
                                                        </div>
                                                    </div>
                                                    <h4 class="rbt-card-title"><a href="course-details.html">React Front To Back</a>
                                                    </h4>
                                                    <ul class="rbt-meta">
                                                        <li><i class="feather-book"></i>20 Lessons</li>
                                                        <li><i class="feather-users"></i>40 Students</li>
                                                    </ul>

                                                    <div class="rbt-card-bottom">
                                                        <div class="rbt-price">
                                                            <span class="current-price">$60</span>
                                                            <span class="off-price">$120</span>
                                                        </div>
                                                        <a class="rbt-btn-link" href="course-details.html">Learn
                                                            More<i class="feather-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Course  -->

                                        <!-- Start Single Course  -->
                                        <div class="col-lg-4 col-md-6 col-12">
                                            <div class="rbt-card variation-01 rbt-hover">
                                                <div class="rbt-card-img">
                                                    <a href="course-details.html">
                                                        <img src="assets/images/course/course-online-02.jpg" alt="Card image">
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
                                                            <a class="rbt-round-btn" title="Bookmark" href="#"><i class="feather-bookmark"></i></a>
                                                        </div>
                                                    </div>
                                                    <h4 class="rbt-card-title"><a href="course-details.html">PHP
                                                            Beginner + Advanced</a>
                                                    </h4>
                                                    <ul class="rbt-meta">
                                                        <li><i class="feather-book"></i>10 Lessons</li>
                                                        <li><i class="feather-users"></i>30 Students</li>
                                                    </ul>

                                                    <div class="rbt-card-bottom">
                                                        <div class="rbt-price">
                                                            <span class="current-price">$20</span>
                                                            <span class="off-price">$43</span>
                                                        </div>
                                                        <a class="rbt-btn-link" href="course-details.html">Learn
                                                            More<i class="feather-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Course  -->

                                        <!-- Start Single Course  -->
                                        <div class="col-lg-4 col-md-6 col-12">
                                            <div class="rbt-card variation-01 rbt-hover">
                                                <div class="rbt-card-img">
                                                    <a href="course-details.html">
                                                        <img src="assets/images/course/course-online-03.jpg" alt="Card image">
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
                                                            <span class="rating-count"> (4 Reviews)</span>
                                                        </div>
                                                        <div class="rbt-bookmark-btn">
                                                            <a class="rbt-round-btn" title="Bookmark" href="#"><i class="feather-bookmark"></i></a>
                                                        </div>
                                                    </div>
                                                    <h4 class="rbt-card-title"><a href="course-details.html">Angular Zero to
                                                            Mastery</a>
                                                    </h4>
                                                    <ul class="rbt-meta">
                                                        <li><i class="feather-book"></i>14 Lessons</li>
                                                        <li><i class="feather-users"></i>26 Students</li>
                                                    </ul>

                                                    <div class="rbt-card-bottom">
                                                        <div class="rbt-price">
                                                            <span class="current-price">$23</span>
                                                            <span class="off-price">$45</span>
                                                        </div>
                                                        <a class="rbt-btn-link" href="course-details.html">Learn
                                                            More<i class="feather-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Course  -->

                                        <!-- Start Single Course  -->
                                        <div class="col-lg-4 col-md-6 col-12">
                                            <div class="rbt-card variation-01 rbt-hover">
                                                <div class="rbt-card-img">
                                                    <a href="course-details.html">
                                                        <img src="assets/images/course/course-online-04.jpg" alt="Card image">
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
                                                            <span class="rating-count"> (3 Reviews)</span>
                                                        </div>
                                                        <div class="rbt-bookmark-btn">
                                                            <a class="rbt-round-btn" title="Bookmark" href="#"><i
                                                                        class="feather-bookmark"></i></a>
                                                        </div>
                                                    </div>
                                                    <h4 class="rbt-card-title"><a href="course-details.html">English Langiage Club</a>
                                                    </h4>
                                                    <ul class="rbt-meta">
                                                        <li><i class="feather-book"></i>20 Lessons</li>
                                                        <li><i class="feather-users"></i>30 Students</li>
                                                    </ul>

                                                    <div class="rbt-card-bottom">
                                                        <div class="rbt-price">
                                                            <span class="current-price">$40</span>
                                                            <span class="off-price">$86</span>
                                                        </div>
                                                        <a class="rbt-btn-link" href="course-details.html">Learn
                                                            More<i class="feather-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Course  -->

                                        <!-- Start Single Course  -->
                                        <div class="col-lg-4 col-md-6 col-12">
                                            <div class="rbt-card variation-01 rbt-hover">
                                                <div class="rbt-card-img">
                                                    <a href="course-details.html">
                                                        <img src="assets/images/course/course-online-06.jpg" alt="Card image">
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
                                                            <span class="rating-count"> (3 Reviews)</span>
                                                        </div>
                                                        <div class="rbt-bookmark-btn">
                                                            <a class="rbt-round-btn" title="Bookmark" href="#"><i
                                                                        class="feather-bookmark"></i></a>
                                                        </div>
                                                    </div>
                                                    <h4 class="rbt-card-title"><a href="course-details.html">Graphic Courses Club</a>
                                                    </h4>
                                                    <ul class="rbt-meta">
                                                        <li><i class="feather-book"></i>50 Lessons</li>
                                                        <li><i class="feather-users"></i>10 Students</li>
                                                    </ul>

                                                    <div class="rbt-card-bottom">
                                                        <div class="rbt-price">
                                                            <span class="current-price">$40</span>
                                                            <span class="off-price">$86</span>
                                                        </div>
                                                        <a class="rbt-btn-link" href="course-details.html">Learn
                                                            More<i class="feather-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Course  -->

                                        <!-- Start Single Course  -->
                                        <div class="col-lg-4 col-md-6 col-12">
                                            <div class="rbt-card variation-01 rbt-hover">
                                                <div class="rbt-card-img">
                                                    <a href="course-details.html">
                                                        <img src="assets/images/course/course-online-05.jpg" alt="Card image">
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
                                                            <span class="rating-count"> (3 Reviews)</span>
                                                        </div>
                                                        <div class="rbt-bookmark-btn">
                                                            <a class="rbt-round-btn" title="Bookmark" href="#"><i
                                                                        class="feather-bookmark"></i></a>
                                                        </div>
                                                    </div>
                                                    <h4 class="rbt-card-title"><a href="course-details.html">Wed Design Club</a>
                                                    </h4>
                                                    <ul class="rbt-meta">
                                                        <li><i class="feather-book"></i>20 Lessons</li>
                                                        <li><i class="feather-users"></i>30 Students</li>
                                                    </ul>

                                                    <div class="rbt-card-bottom">
                                                        <div class="rbt-price">
                                                            <span class="current-price">$40</span>
                                                            <span class="off-price">$86</span>
                                                        </div>
                                                        <a class="rbt-btn-link" href="course-details.html">Learn
                                                            More<i class="feather-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Course  -->
                                    </div>
                                 
                                </div>




                                <div id="reviews-section" class="rbt-dashboard-content bg-color-white rbt-shadow-box mb--60 rbt-dashboard-table" style="display: none;">
                                    <div class="section-title">
                                        <h4 class="rbt-title-style-3">Mes avis</h4>
                                    </div>


                                 
                                        <!-- Start Enrole Course  -->
                                      
            
            
                                                            <table class="rbt-table table table-borderless">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Course Title</th>
                                                                        <th>Review</th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <th>Course: How to Write Your First Novel</th>
                                                                        <td>
                                                                            <div class="rbt-review">
                                                                                <div class="rating">
                                                                                    <i class="fas fa-star"></i>
                                                                                    <i class="fas fa-star"></i>
                                                                                    <i class="fas fa-star"></i>
                                                                                    <i class="fas fa-star"></i>
                                                                                    <i class="fas fa-star"></i>
                                                                                </div>
                                                                                <span class="rating-count"> (9 Reviews)</span>
                                                                            </div>
                                                                            <p class="b3">Good</p>
                                                                        </td>
                                                                        <td>
                                                                            <div class="rbt-button-group">
                                                                                <a class="rbt-btn-link left-icon" href="#"><i class="feather-edit"></i> Edit</a>
                                                                                <a class="rbt-btn-link left-icon" href="#"><i class="feather-trash-2"></i> Delete</a>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Course: How to Web Design</th>
                                                                        <td>
                                                                            <div class="rbt-review">
                                                                                <div class="rating">
                                                                                    <i class="fas fa-star"></i>
                                                                                    <i class="fas fa-star"></i>
                                                                                    <i class="fas fa-star"></i>
                                                                                    <i class="fas fa-star"></i>
                                                                                    <i class="fas fa-star"></i>
                                                                                </div>
                                                                                <span class="rating-count"> (9 Reviews)</span>
                                                                            </div>
                                                                            <p class="b3">Awesome Course</p>
                                                                        </td>
                                                                        <td>
                                                                            <div class="rbt-button-group">
                                                                                <a class="rbt-btn-link left-icon" href="#"><i class="feather-edit"></i> Edit</a>
                                                                                <a class="rbt-btn-link left-icon" href="#"><i class="feather-trash-2"></i> Delete</a>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Course: English</th>
                                                                        <td>
                                                                            <div class="rbt-review">
                                                                                <div class="rating">
                                                                                    <i class="fas fa-star"></i>
                                                                                    <i class="fas fa-star"></i>
                                                                                    <i class="off fas fa-star"></i>
                                                                                    <i class="off fas fa-star"></i>
                                                                                    <i class="off fas fa-star"></i>
                                                                                </div>
                                                                                <span class="rating-count"> (9 Reviews)</span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="rbt-button-group">
                                                                                <a class="rbt-btn-link left-icon" href="#"><i class="feather-edit"></i> Edit</a>
                                                                                <a class="rbt-btn-link left-icon" href="#"><i class="feather-trash-2"></i> Delete</a>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
            
                                                                </tbody>
            
                                                            </table>
                                                        
                                 

                                  
                                 
                                </div>

                                <div id="settings-section" class="rbt-dashboard-content bg-color-white rbt-shadow-box mb--60 rbt-dashboard-table" style="display: none;">
                                    <div class="section-title">
                                        <h4 class="rbt-title-style-3">Mes paramettres</h4>
                                    </div>

                                    <div class="account-details-form">
                                        <form action="#">
                                            <div class="row g-5">
                                                <div class="col-lg-6 col-12">
                                                    <input id="first-name" placeholder="First Name" type="text">
                                                </div>

                                                <div class="col-lg-6 col-12">
                                                    <input id="last-name" placeholder="Last Name" type="text">
                                                </div>

                                                <div class="col-12">
                                                    <input id="display-name" placeholder="Display Name" type="text">
                                                </div>

                                                <div class="col-12">
                                                    <input id="email-address" placeholder="Email Address" type="email">
                                                </div>

                                                <div class="col-12">
                                                    <h4>Password change</h4>
                                                </div>

                                                <div class="col-12">
                                                    <input id="current-pwd" placeholder="Current Password" type="password">
                                                </div>

                                                <div class="col-lg-6 col-12">
                                                    <input id="new-pwd" placeholder="New Password" type="password">
                                                </div>

                                                <div class="col-lg-6 col-12">
                                                    <input id="confirm-pwd" placeholder="Confirm Password" type="password">
                                                </div>

                                                <div class="col-12">
                                                    <button class="rbt-btn btn-gradient icon-hover">
                                                        <span class="btn-text">Save Changes</span>
                                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                                    </button>
                                                </div>

                                            </div>
                                        </form>
                                    </div>


                                    
                                  
                                 
                                </div>



                                
                                <div id="addresses-section" class="rbt-dashboard-content bg-color-white rbt-shadow-box mb--60 rbt-dashboard-table" style="display: none;">
                                    <div class="section-title">
                                        <h4 class="rbt-title-style-3">Mes adresses</h4>
                                    </div>

                                    <div class="account-details-form">
                                       
                                        <div class="rbt-my-account-inner">
                                            <h3>Billing Address</h3>
    
                                            <address>
                                                <p><strong>Banani, Dhaka</strong></p>
                                                <p>1205 Supper Market<br>
                                                Dhaka, Bangladesh</p>
                                                <p>Mobile: 01911111111</p>
                                            </address>
    
                                            <div class="rbt-link-hover">
                                                <a href="#" class="d-inline-block"><i class="fa fa-edit mr--5"></i>Edit Address</a>
                                            </div>
                                        </div>

                                        <div class="rbt-link-hover">
                                            <a href="#" class="d-inline-block" data-toggle="modal" data-target="#addAddressModal">
                                                <i class="fa fa-plus mr--5"></i> Ajouter une nouvelle adresse
                                            </a>
                                        </div>
                                        
                                    </div>

<!-- Modal -->
<div class="modal fade" id="addAddressModal" tabindex="-1" aria-labelledby="addAddressModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAddressModalLabel">Ajouter une Nouvelle Adresse</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form {{-- action="{{ route('adresse.store') }}" --}} method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="adresse">Adresse</label>
                        <input type="text" class="form-control" id="adresse" name="adresse" required>
                    </div>
                    <div class="form-group">
                        <label for="ville">Ville</label>
                        <input type="text" class="form-control" id="ville" name="ville" required>
                    </div>
                    <div class="form-group">
                        <label for="pays">Pays</label>
                        <input type="text" class="form-control" id="pays" name="pays" required>
                    </div>
                    <div class="form-group">
                        <label for="telephone">Téléphone</label>
                        <input type="text" class="form-control" id="telephone" name="telephone" required>
                    </div>
                    <button type="submit" class="btn btn-success">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</div>

                                    
                                  
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
          
            .rbt-dashboard-table {
                display: none;
            }



            /* Style des onglets */
.nav-tabs .nav-link {
    font-size: 16px;
    font-weight: bold;
}

.nav-tabs .nav-link.active {
    color: #fff;
    background-color: #007bff;  /* Onglet actif en bleu */
    border-color: #007bff;
}

.tab-pane {
    padding: 20px;
}


        </style>

<script>
    // Ajoute un événement pour gérer les onglets activés
    document.querySelectorAll('.tab-button').forEach(button => {
        button.addEventListener('click', function() {
            // Enlever la classe 'active' des onglets
            document.querySelectorAll('.tab-button').forEach(tab => {
                tab.classList.remove('active');
            });
            // Ajouter la classe 'active' au bouton cliqué
            this.classList.add('active');
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Sélectionner les boutons et les sections
        const tabs = document.querySelectorAll(".tab-button");
        const sections = document.querySelectorAll(".tab-pane");

        // Ajouter un événement de clic à chaque bouton
        tabs.forEach(tab => {
            tab.addEventListener("click", function () {
                // Supprimer la classe active de toutes les sections
                sections.forEach(section => section.classList.remove("active"));

                // Ajouter la classe active à la section correspondante
                const targetId = this.id.replace("-tab", "");
                const targetSection = document.getElementById(targetId);
                targetSection.classList.add("active");
            });
        });
    });
</script>


        <script>
            // Lorsque l'on clique sur un lien de la sidebar
            document.querySelectorAll('.sidebar-link').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Masquer toutes les sections
                    document.querySelectorAll('.rbt-dashboard-table').forEach(section => {
                        section.style.display = 'none';
                    });

                    // Afficher la section cible
                    const targetSection = document.querySelector(this.getAttribute('data-target'));
                    targetSection.style.display = 'block';

                    // Scroller jusqu'à la section
                    targetSection.scrollIntoView({
                        behavior: 'smooth'
                    });

                    // Activer le lien cliqué
                    document.querySelectorAll('.sidebar-link').forEach(link => {
                        link.classList.remove('active');
                    });
                    this.classList.add('active');
                });
            });

            // Afficher par défaut la première section
            document.querySelector('#dashboard-section').style.display = 'block';
        </script>
    </body>
</main>
@endsection
