@extends('front.fixe')
@section('titre', 'Detail article')
@section('body')

    <main>
        @php
            $config = DB::table('settings')->first();
           

            $comments = $post->validComments()->with('user')->paginate(10);

        @endphp


        <!-- End Side Vav -->
        <a class="close_side_menu" href="javascript:void(0);"></a>

        <div class="rbt-overlay-page-wrapper">
            <div class="breadcrumb-image-container breadcrumb-style-max-width">
                {{--  <div class="breadcrumb-image-wrapper">
                <img  src="{{ url('public/Image/posts/' . $post->image) }}" alt="Education Images">
            </div> --}}
                <div class="breadcrumb-content-top text-center">
                    <ul class="meta-list justify-content-center mb--10">
                        <li class="list-item">
                            <div class="author-thumbnail">
                                <img src="/assets/images/testimonial/client-06.png" alt="blog-image">
                            </div>
                            <div class="author-info">
                                <a href="#"><strong>{{ $post->user->last_name ?? '' }}</strong></a> in
                               {{--  @foreach ($post->categories as $category)
                                    <a
                                        href="{{ route('category', $category->slug) }}"><strong>{{ $category->title }}</strong></a>
                                @endforeach --}}

                            </div>
                        </li>
                        <li class="list-item">
                            <i class="feather-clock"></i>
                           {{--  <span> {{ formatDate($post->created_at) }}</span> --}}
                        </li>
                    </ul>
                    <h1 class="title">{{ $post->title }}.</h1>
                    {{-- <p>Ten Advices That You Must Listen Before Studying Education.</p> --}}
                </div>
            </div>

            <div class="rbt-blog-details-area rbt-section-gapBottom breadcrumb-style-max-width">
                <div class="blog-content-wrapper rbt-article-content-wrapper">

                    <div class="content">
                        <div class="post-thumbnail mb--30 position-relative wp-block-image alignwide">
                            <figure>
                                <img src="{{ asset('storage/photos/' . $post->image) }}"  alt="Blog Images">
                                {{--  <figcaption>Business and core management app are for enterprise.</figcaption> --}}
                            </figure>
                        </div>

                        <p>{{ $post->meta_description }}</p>

                        <blockquote class="rbt-blockquote">
                            <p>{{ $post->excerpt ?? ' ' }}</p>
                        </blockquote>


                        {{--   <div class="wp-block-gallery columns-3 is-cropped">
                        <ul class="blocks-gallery-grid">
                            <li class="blocks-gallery-item">
                                <figure>
                                    <img class="radius-4" src="assets/images/blog/blog-gallery-01.jpg" alt="Blog Images">
                                </figure>
                            </li>
                            <li class="blocks-gallery-item">
                                <figure>
                                    <img class="radius-4" src="assets/images/blog/blog-gallery-02.jpg" alt="Blog Images">
                                </figure>
                            </li>
                            <li class="blocks-gallery-item">
                                <figure>
                                    <img class="radius-4" src="assets/images/blog/blog-gallery-03.jpg" alt="Blog Images">
                                </figure>
                            </li>
                        </ul>
                    </div> --}}


                        <p class="mb-10" style="text-align: justify;">
                            {{ $post->body }}
                        </p>

                        <!-- BLog Tag Clound  -->
                        {{-- <div class="tagcloud">
                            <a href="#">Education</a>
                            <a href="#">Life Style</a>
                            <a href="#">React</a>
                            <a href="#">Javascript</a>
                            <a href="#">Web App</a>
                            <a href="#">Application</a>
                        </div>
 --}}
                        <!-- Social Share Block  -->
                       {{--  <div class="social-share-block">
                            <div class="post-like">
                                <a href="#"><i class="feather feather-thumbs-up"></i><span>2.2k Like</span></a>
                            </div>
                            <ul class="social-icon social-default transparent-with-border">
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
 --}}

                        <!-- Blog Author  -->
                    {{--     <div class="about-author">
                            <div class="media">
                                <div class="thumbnail">
                                    <a href="#">
                                        <img src="/assets/images/testimonial/testimonial-4.jpg" alt="Author Images">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <div class="author-info">
                                        <h5 class="title">
                                            <a class="hover-flip-item-wrapper" href="#">
                                                {{ $post->user->first_name ?? '' }} {{ $post->user->last_name ?? '' }}
                                            </a>
                                        </h5>
                                        <span class="b3 subtitle">Sr. UX Designer</span>
                                    </div>
                                    <div class="content">
                                        <p class="description">At 29 years old, my favorite compliment is being
                                            told that I look like my mom. Seeing myself in her image, like this
                                            daughter up top.</p>
                                        <ul class="social-icon social-default icon-naked justify-content-start">
                                            <li><a href="#">
                                                    <i class="feather-facebook"></i>
                                                </a>
                                            </li>
                                            <li><a href="#">
                                                    <i class="feather-twitter"></i>
                                                </a>
                                            </li>
                                            <li><a href="#">
                                                    <i class="feather-instagram"></i>
                                                </a>
                                            </li>
                                            <li><a href="#">
                                                    <i class="feather-linkedin"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div> --}}

                        <div class="rbt-comment-area">
                            <div class="rbt-total-comment-post">
                                <div class="title">
                                    <h4 class="mb--0"> {{ $post->comments->count() }}+ Commentaires</h4>
                                </div>
                                {{-- <div class="add-comment-button">
                                    <button type="button"class="rbt-btn btn-gradient icon-hover radius-round btn-md"
                                        href="#" data-bs-toggle="modal" data-bs-target="#commentModal">
                                        <span class="btn-text">Ajouter votre commentaite</span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    </button>
                                </div>
                                <div id="successMessage" class="alert alert-success" style="display:none;"></div>
                                <div id="errorMessage" class="alert alert-danger" style="display:none;"></div> --}}

                            </div>

                            <!-- Modal -->



                            <div class="comment-respond">
                                @if (Auth::check())
                                    <h4 class="title">Postez un commentaire</h4>
                                    <form method="post" class="comment-form-1"
                                       {{--  action="{{ route('posts.comments.store', $post->id) }}" --}}>
                                        @csrf
                                        <div class="row row--10">



                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="message">Laissez votre message</label>
                                                    <textarea id="message" name="message"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">


                                                <button type="submit" name="submit" id="submit"
                                                    id="submitnn"class="rbt-btn btn-gradient icon-hover radius-round btn-md">
                                                    <span class="btn-text">Postez votre commentaire</span>
                                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                                </button>
                                            </div>
                                        </div>


                                    </form>
                                @else
                                    <div class="alert" style="background-color: #f0ad4e; color: white;">
                                        <p>Vous devez <a href="{{ route('login') }}" style="color: white;">vous
                                                connecter</a> pour laisser un commentaire.</p>
                                    </div>
                                @endif


                                <script src="path/to/your/main.js"></script>
                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                <script>
                                    $(document).ready(function() {
                                        $('.comment-form-1').on('submit', function(event) {
                                            event.preventDefault(); // Prevent normal form submission

                                            var form = $(this);
                                            var url = form.attr('action');
                                            var data = form.serialize(); // Serialize form data

                                            $.ajax({
                                                type: 'POST',
                                                url: url,
                                                data: data,
                                                success: function(response) {
                                                    // Display success message
                                                    Swal.fire({
                                                        icon: 'success',
                                                        title: 'Succès!',
                                                        html: response,
                                                        timer: 5000, // Duration before auto-close
                                                        timerProgressBar: true,
                                                        didOpen: () => {
                                                            Swal.showLoading();
                                                        },
                                                        willClose: () => {
                                                            // Refresh the page after the message closes
                                                            window.location.reload();
                                                        }
                                                    });

                                                    // Reset the form fields
                                                    form.trigger('reset');
                                                },
                                                error: function(xhr) {
                                                    // Display error messages
                                                    Swal.fire({
                                                        icon: 'error',
                                                        title: 'Erreur!',
                                                        html: xhr.responseText || 'Une erreur est survenue.',
                                                        timer: 5000, // Duration before auto-close
                                                        timerProgressBar: true,
                                                        didOpen: () => {
                                                            Swal.showLoading();
                                                        },
                                                        willClose: () => {
                                                            // Refresh the page after the message closes
                                                            window.location.reload();
                                                        }
                                                    });
                                                }
                                            });
                                        });
                                    });
                                </script>
                            </div>
                        </div>

                        <div class="rbt-comment-area">
                            <h4 class="title">{{ $post->comments->count() }} commentaires</h4>
                            <ul class="comment-list">
                                <!-- Start Single Comment  -->

                                @if ($comments->isEmpty())
                                    <div class="alert alert-info">
                                        <p>Aucun commentaire n'a été publié pour le moment. Soyez le premier à laisser un
                                            commentaire !</p>
                                    </div>
                                @else
                                    @foreach ($comments as $comment)
                                        <li class="comment">
                                            <div class="comment-body">
                                                <div class="single-comment">
                                                    <div class="comment-img">
                                                        <img src="/assets/images/testimonial/testimonial-1.jpg"
                                                            alt="Author Images">
                                                    </div>
                                                    <div class="comment-inner">
                                                        <h6 class="commenter">
                                                             <a href="#">{{ $comment->user->last_name ?? ' ' }}</a> 
                                                        </h6>
                                                        <div class="comment-meta">
                                                            <div class="time-spent">{{ $comment->created_at->diffForHumans() }}</div>
                                                          
                                                        </div>
                                                        <div class="comment-text">

                                                            <p class="b2"> {{ $comment->body }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </li>
                                    @endforeach
                                @endif
                                <!-- End Single Comment  -->


                            </ul>
                              <!-- Pagination Links -->
                              <div class="pagination-wrapper">
                                {{ $comments->links('pagination::bootstrap-4') }}
                            </div>

                        </div>

                    </div>


                </div>
            </div>

        </div>




    </main>
@endsection
