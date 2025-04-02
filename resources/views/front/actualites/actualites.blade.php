@extends('front.fixe')
@section('titre', 'Blogs')
@section('body')

    <main>
        @php
            $config = DB::table('settings')->first();
            

        @endphp



        <!-- End Side Vav -->
        <a class="close_side_menu" href="javascript:void(0);"></a>

        <div class="rbt-page-banner-wrapper">
            <!-- Start Banner BG Image  -->
            <div class="rbt-banner-image"></div>
            <!-- End Banner BG Image  -->
            <div class="rbt-banner-content">

                <!-- Start Banner Content Top  -->
                <div class="rbt-banner-content-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Start Breadcrumb Area  -->
                                <ul class="page-list">
                                    <li class="rbt-breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                                    <li>
                                        <div class="icon-right"><i class="feather-chevron-right"></i></div>
                                    </li>
                                    <li class="rbt-breadcrumb-item active">Tous les tutoriels</li>
                                </ul>
                                <!-- End Breadcrumb Area  -->

                                <div class="title-wrapper">
                                    <h1 class="title mb--0">Toutes les Actualité</h1>
                                    <a href="#" class="rbt-badge-2">

                                        <div class="image">🎉</div>  {{ $total_post }} Tutoriels
                                    </a>
                                </div>

                                <p class="description">Des articles qui aident les débutants à devenir de véritables
                                    licornes. </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Banner Content Top  -->

            </div>
        </div>

        <div class="rbt-section-overlayping-top rbt-section-gapBottom">
            <div class="container">
                <div class="row row--30 gy-5">

                    <div class="col-lg-8">

                        <!-- Start Card Area -->
                        <div class="row g-5">

                            <!-- Start Single Card  -->
                            @if ($posts->isEmpty())
                                <div class="alert alert-info">
                                    <p>Aucune publication n'est disponible pour le moment.</p>
                                </div>
                            @else
                                @foreach ($posts as $post)
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="rbt-blog-grid rbt-card variation-02 rbt-hover">
                                            <div class="rbt-card-img">
                                                <a
                                                    href="{{ url('details-blog', ['id' => $post->id, 'slug' => Str::slug(Str::limit($post->title, 10))]) }}">
                                                    <img {{-- src="{{ url('public/Image/posts/' . $post->image) }}" --}}
                                                    src="{{ asset('storage/photos/' . $post->image) }}" 
                                                        alt="Card image"> </a>
                                            </div>
                                            <div class="rbt-card-body">
                                                <h5 class="rbt-card-title"><a
                                                        href="{{ url('details-blog', ['id' => $post->id, 'slug' => Str::slug(Str::limit($post->title, 10))]) }}">{{ $post->title }}
                                                        .</a></h5>

                                                <ul class="blog-meta">
                                                    <li><i class="feather-user"></i> {{$post->user->name ?? ' '}}</li>
                                                    <li><i class="feather-clock"></i>
                                                        {{ $post->created_at->format('F j, Y') }}</li>
                                                    <li><i class="feather-watch"></i> {{ $post->reading_time }} min read
                                                    </li>
                                                </ul>
                                                <p class="rbt-card-text">{{ $post->meta_description }}.</p>
                                                <div class="rbt-card-bottom">
                                                    <a class="transparent-button"
                                                        href="{{ url('details-blog', ['id' => $post->id, 'slug' => Str::slug(Str::limit($post->title, 10))]) }}">Voir les détails
                                                        <i><svg width="17" height="12"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g stroke="#27374D" fill="none" fill-rule="evenodd">
                                                                    <path d="M10.614 0l5.629 5.629-5.63 5.629" />
                                                                    <path stroke-linecap="square" d="M.663 5.572h14.594" />
                                                                </g>
                                                            </svg></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            <!-- End Single Card  -->


                        </div>
                        <!-- End Card Area -->

                        <div class="row">
                            <div class="col-lg-12 mt--60">
                                <nav>
                                    <ul class="rbt-pagination">
                                        {{ $posts->links('pagination::bootstrap-4') }} 
                                    </ul>
                                </nav>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-4">
                        <aside class="rbt-sidebar-widget-wrapper rbt-gradient-border">

                            <!-- Start Widget Area  -->
                            <div class="rbt-single-widget rbt-widget-search">
                                <div class="inner">
                                    <form action="{{ url('blog') }}" method="get" class="rbt-search-style-1">
                                        <input type="text" id="search" type="search" name="search"
                                        value="{{ $title ?? '' }}" placeholder="Rechercher un article">
                                        <button  value="Search" type="submit" class="search-btn"><i class="feather-search"></i></button>
                                    </form>
                                </div>
                            </div>
                            <!-- End Widget Area  -->

                            <!-- Start Widget Area  -->
                            <div class="rbt-single-widget rbt-widget-recent">
                                <div class="inner">
                                    <h4 class="rbt-widget-title">Les rescents posts</h4>
                                    <ul class="rbt-sidebar-list-wrapper recent-post-list">
                                        @foreach ($recentPosts as $post)
                                        <li>
                                            <div class="thumbnail">
                                                <a  href="{{ url('details-blog', ['id' => $post->id, 'slug' => Str::slug(Str::limit($post->title, 10))]) }}">
                                                    <img  src="{{ asset('storage/photos/' . $post->image) }}"  alt="Event Images">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h6 class="title"><a href="{{ url('details-blog', ['id' => $post->id, 'slug' => Str::slug(Str::limit($post->title, 10))]) }}">
                                                        {{$post->title}}</a></h6>
                                                <ul class="rbt-meta">
                                                    <li><i class="feather-clock"></i> {{ \Carbon\Carbon::parse($post->created_at)->isoFormat('D MMM YYYY') }}</li>
                                                </ul>
                                            </div>
                                        </li>
                                        @endforeach
                                      
                                    </ul>
                                </div>
                            </div>
                            <!-- End Widget Area  -->

                            <!-- Start Widget Area  -->
                            <div class="rbt-single-widget rbt-widget-recent">
                                <div class="inner">
                                    <h4 class="rbt-widget-title">Les posts populaires</h4>
                                    <ul class="rbt-sidebar-list-wrapper recent-post-list">
                                        @foreach ($popularPosts as $post)
                                        <li>
                                            <div class="thumbnail">
                                                <a  href="{{ url('details-blog', ['id' => $post->id, 'slug' => Str::slug(Str::limit($post->title, 10))]) }}">
                                                    <img src="{{ asset('storage/photos/' . $post->image) }}"  alt="Event Images">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h6 class="title"><a  href="{{ url('details-blog', ['id' => $post->id, 'slug' => Str::slug(Str::limit($post->title, 10))]) }}">Elegant Light Box Paper
                                                        Cut.</a></h6>
                                                <ul class="rbt-meta">
                                                    <li><i class="feather-clock"></i>{{ \Carbon\Carbon::parse($post->created_at)->isoFormat('D MMM YYYY') }}</li>
                                                </ul>
                                            </div>
                                        </li>
                                        @endforeach
                                     
                                    </ul>
                                </div>
                            </div>
                            <!-- End Widget Area  -->

                            <!-- Start Widget Area  -->
                            <div class="rbt-single-widget rbt-widget-tag">
                                <div class="inner">
                                   {{--  <h4 class="rbt-widget-title">Tags</h4>
                                    <div class="rbt-sidebar-list-wrapper rbt-tag-list">
                                        @foreach ($recentPostsWithTags as $post)

                                        @foreach ($post->tags as $tag)
                                        <a href="{{ route('tag', $tag->slug) }}">{{ $tag->tag }}</a>
                                        @endforeach
                                    
                                        @endforeach

                                    </div> --}}
                                </div>
                            </div>
                            <!-- End Widget Area  -->
                        </aside>
                    </div>

                </div>
            </div>
        </div>

        <div class="rbt-separator-mid">
            <div class="container">
                <hr class="rbt-separator m-0">
            </div>
        </div>
     
    </main>
@endsection