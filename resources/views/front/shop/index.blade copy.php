@extends('front.fixe')
@section('titre', 'Shop')
@section('body')

    <head>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
    </head>
    <main>

        <!-- breadcrumb area start -->

        <!-- breadcrumb area end -->

        <!-- product-area-start -->

        <div class="tp-product__area fix pt-150 pb-150">
            {{-- @if (session('success'))
      <div class="alert alert-success">
         {{ session('success') }}
      </div>
      @endif --}}


            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-40">
                        {{-- <div class="tp-product__left-text">
                  <span>Showing <b>09/200</b> result</span>
               </div> --}}

                    </div>
                    <div class="col-xl-9 col-lg-8 col-md-6 col-sm-6 mb-40">
                        <div class="tp-shop-top d-flex align-items-center justify-content-sm-end">
                            <div class="tp-product__text">
                                <span>Filtrer par</span>
                            </div>
                            <div class="tp-product__filter">
                                <select onchange="window.location.href=this.value;">
                                    <option value="{{ url('shop') }}">Default</option>
                                    <option value="{{ url('shopParPrixAsc') }}">Croissant</option>

                                    <option value="{{ url('shopParPrix') }}">Décroissant</option>

                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4">
                        <div class="tp-product-sidebar">
                            <!-- search -->
                            <div class="tp-product-widget mb-30">
                                <h6 class="">
                                    <b>Recherche</b>
                                </h6>
                                <div class="sidebar__widget-content">
                                    <div class="sidebar__search">
                                        <form role="search" action="/shop" method="POST">
                                            @csrf
                                            <div class="sidebar__search-input-2">
                                                <input type="search" id="search_product" name="key"
                                                    value="{{ $key }}" value="{{ $nom ?? '' }}"
                                                    placeholder="echercher un produit" required>
                                                <button type="submit" value="Search"><i class="far fa-search"></i></button>
                                            </div>
                                        </form>

                                    </div>
                                </div>

                            </div>

                            <!-- categories -->
                            <div class="tp-product-widget mb-30">
                                <h5 class="">
                                    <b>Les categories</b>
                                </h5>
                                <div class="tp-product-widget-content">



                                    <div class="tp-product-widget-category small">
                                        <ul>
                                            @foreach ($categories as $category)
                                                <li>
                                                    <a href="/shop?id_categorie={{ $category->id }}" class="small"
                                                        class="{{ isset($current_category) && $current_category->id === $category->id ? 'selected' : '' }}">
                                                        {{ Str::limit($category->nom,25) }}
                                                    </a>    
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                            </div>

                            <!-- filter -->
                            <div class="tp-product-widget mb-30 range">
                                <h5>
                                    <b>Filtrer par prix</b>
                                </h5>
                                <div class="tp-product-widget-content">
                                    <form action="/shop" method="post">
                                    @csrf
                                    <div class="tp-product-widget-filter">
                                        <div id="slider-range" data-min="0" data-max="{{ $max_prix }}"></div>
                                        <div
                                            class="tp-product-widget-filter-info product_filter d-flex align-items-center justify-content-between mb-10">
                                            <i> Prix: </i>
                                            <span class="input-range">
                                                <input style="" type="text" id="amount" readonly>
                                                <input type="hidden" name="price_range" id="price_range" />
                                                
                                            </span>
                                        </div>
                                        <button class="btn btn-success" type="submit">
                                            Filter
                                        </button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8">
                        <div class="row">
                            @forelse ($produits as $key => $produit)
                                <div class="col-xl-4 col-md-6 col-sm-6">
                                    <div class="tp-product-item-2 mb-40">
                                        <div class="tp-product-thumb-2 p-relative z-index-1 fix w-img">
                                            <a href="{{ route('details-produits', ['id' => $produit->id]) }}">
                                                <img src="{{ Storage::url($produit->photo) }}" alt="">
                                            </a>
                                            <!-- product action -->
                                            <div class="tp-product-action-2 tp-product-action-blackStyle">
                                                <div class="tp-product-action-item-2 d-flex flex-column">
                                                    <button type="button"
                                                        class="tp-product-action-btn-2 tp-product-add-cart-btn"
                                                        onclick="AddToCart({{ $produit->id }})">
                                                        <svg width="17" height="17" viewBox="0 0 17 17"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M3.34706 4.53799L3.85961 10.6239C3.89701 11.0923 4.28036 11.4436 4.74871 11.4436H4.75212H14.0265H14.0282C14.4711 11.4436 14.8493 11.1144 14.9122 10.6774L15.7197 5.11162C15.7384 4.97924 15.7053 4.84687 15.6245 4.73995C15.5446 4.63218 15.4273 4.5626 15.2947 4.54393C15.1171 4.55072 7.74498 4.54054 3.34706 4.53799ZM4.74722 12.7162C3.62777 12.7162 2.68001 11.8438 2.58906 10.728L1.81046 1.4837L0.529505 1.26308C0.181854 1.20198 -0.0501969 0.873587 0.00930333 0.526523C0.0705036 0.17946 0.406255 -0.0462578 0.746256 0.00805037L2.51426 0.313534C2.79901 0.363599 3.01576 0.5995 3.04042 0.888012L3.24017 3.26484C15.3748 3.26993 15.4139 3.27587 15.4726 3.28266C15.946 3.3514 16.3625 3.59833 16.6464 3.97849C16.9303 4.35779 17.0493 4.82535 16.9813 5.29376L16.1747 10.8586C16.0225 11.9177 15.1011 12.7162 14.0301 12.7162H14.0259H4.75402H4.74722Z"
                                                                fill="currentColor" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M12.6629 7.67446H10.3067C9.95394 7.67446 9.66919 7.38934 9.66919 7.03804C9.66919 6.68673 9.95394 6.40161 10.3067 6.40161H12.6629C13.0148 6.40161 13.3004 6.68673 13.3004 7.03804C13.3004 7.38934 13.0148 7.67446 12.6629 7.67446Z"
                                                                fill="currentColor" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M4.38171 15.0212C4.63756 15.0212 4.84411 15.2278 4.84411 15.4836C4.84411 15.7395 4.63756 15.9469 4.38171 15.9469C4.12501 15.9469 3.91846 15.7395 3.91846 15.4836C3.91846 15.2278 4.12501 15.0212 4.38171 15.0212Z"
                                                                fill="currentColor" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M4.38082 15.3091C4.28477 15.3091 4.20657 15.3873 4.20657 15.4833C4.20657 15.6763 4.55592 15.6763 4.55592 15.4833C4.55592 15.3873 4.47687 15.3091 4.38082 15.3091ZM4.38067 16.5815C3.77376 16.5815 3.28076 16.0884 3.28076 15.4826C3.28076 14.8767 3.77376 14.3845 4.38067 14.3845C4.98757 14.3845 5.48142 14.8767 5.48142 15.4826C5.48142 16.0884 4.98757 16.5815 4.38067 16.5815Z"
                                                                fill="currentColor" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M13.9701 15.0212C14.2259 15.0212 14.4333 15.2278 14.4333 15.4836C14.4333 15.7395 14.2259 15.9469 13.9701 15.9469C13.7134 15.9469 13.5068 15.7395 13.5068 15.4836C13.5068 15.2278 13.7134 15.0212 13.9701 15.0212Z"
                                                                fill="currentColor" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M13.9692 15.3092C13.874 15.3092 13.7958 15.3874 13.7958 15.4835C13.7966 15.6781 14.1451 15.6764 14.1443 15.4835C14.1443 15.3874 14.0652 15.3092 13.9692 15.3092ZM13.969 16.5815C13.3621 16.5815 12.8691 16.0884 12.8691 15.4826C12.8691 14.8767 13.3621 14.3845 13.969 14.3845C14.5768 14.3845 15.0706 14.8767 15.0706 15.4826C15.0706 16.0884 14.5768 16.5815 13.969 16.5815Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                        <span class="tp-product-tooltip tp-product-tooltip-right">Ajouter
                                                            au panier</span>
                                                    </button>
                                                    <button type="button"
                                                        class="tp-product-action-btn-2 tp-product-add-to-wishlist-btn"
                                                        onclick="AddFavoris({{ $produit->id }})">
                                                        <svg width="18" height="18" viewBox="0 0 18 18"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M1.60355 7.98635C2.83622 11.8048 7.7062 14.8923 9.0004 15.6565C10.299 14.8844 15.2042 11.7628 16.3973 7.98985C17.1806 5.55102 16.4535 2.46177 13.5644 1.53473C12.1647 1.08741 10.532 1.35966 9.40484 2.22804C9.16921 2.40837 8.84214 2.41187 8.60476 2.23329C7.41078 1.33952 5.85105 1.07778 4.42936 1.53473C1.54465 2.4609 0.820172 5.55014 1.60355 7.98635ZM9.00138 17.0711C8.89236 17.0711 8.78421 17.0448 8.68574 16.9914C8.41055 16.8417 1.92808 13.2841 0.348132 8.3872C0.347252 8.3872 0.347252 8.38633 0.347252 8.38633C-0.644504 5.30321 0.459792 1.42874 4.02502 0.284605C5.69904 -0.254635 7.52342 -0.0174044 8.99874 0.909632C10.4283 0.00973263 12.3275 -0.238878 13.9681 0.284605C17.5368 1.43049 18.6446 5.30408 17.6538 8.38633C16.1248 13.2272 9.59485 16.8382 9.3179 16.9896C9.21943 17.0439 9.1104 17.0711 9.00138 17.0711Z"
                                                                fill="currentColor" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M14.203 6.67473C13.8627 6.67473 13.5743 6.41474 13.5462 6.07159C13.4882 5.35202 13.0046 4.7445 12.3162 4.52302C11.9689 4.41097 11.779 4.04068 11.8906 3.69666C12.0041 3.35175 12.3724 3.16442 12.7206 3.27297C13.919 3.65901 14.7586 4.71561 14.8615 5.96479C14.8905 6.32632 14.6206 6.64322 14.2575 6.6721C14.239 6.67385 14.2214 6.67473 14.203 6.67473Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                        <span class="tp-product-tooltip tp-product-tooltip-right">Ajouter
                                                            aux favoris</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tp-product-content-2">
                                            <div class="tp-product-tag-2 mb-10">
                                                <span>{{ Str::limit($produit->categories->nom, 20) }}</span>
                                            </div>
                                            <h3 class="tp-product-title-2">
                                                <a href="{{ route('details-produits', ['id' => $produit->id]) }}">
                                                    {{ $produit->nom }}
                                                </a>
                                            </h3>
                                            <div class="tp-product-price-wrapper-2 mb-15">
                                                <span class="tp-product-price-2 new-price">
                                                    @if ($produit->inPromotion())
                                                        <span class=" small">
                                                            - {{ $produit->inPromotion()->pourcentage }} %
                                                        </span>
                                                        <b class="text-success">
                                                            {{ $produit->getPrice() }} DT
                                                        </b>
                                                        <br>
                                                        <strike>
                                                            <span class="text-danger small">
                                                                {{ $produit->prix }} DT
                                                            </span>
                                                        </strike>
                                                    @else
                                                        {{ $produit->getPrice() }} DT
                                                    @endif
                                                </span>
                                            </div>
                                            <div class="tp-product-button">
                                                <button type="button" class="tp-btn-price w-100 text-center"
                                                    onclick="AddToCart({{ $produit->id }})">
                                                    <i>
                                                        <svg width="16" height="16" viewBox="0 0 16 16"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M4.56973 13.1809C5.19175 13.1809 5.70135 13.7014 5.70135 14.3443C5.70135 14.9795 5.19175 15.5 4.56973 15.5C3.94023 15.5 3.43062 14.9795 3.43062 14.3443C3.43062 13.7014 3.94023 13.1809 4.56973 13.1809ZM13.0007 13.1809C13.6227 13.1809 14.1323 13.7014 14.1323 14.3443C14.1323 14.9795 13.6227 15.5 13.0007 15.5C12.3712 15.5 11.8616 14.9795 11.8616 14.3443C11.8616 13.7014 12.3712 13.1809 13.0007 13.1809ZM1.08367 0.50009L1.16004 0.506554L2.9474 0.781326C3.2022 0.828014 3.38955 1.04156 3.41204 1.30179L3.55443 3.01624C3.57691 3.26193 3.77176 3.44562 4.01157 3.44562H14.1324C14.5896 3.44562 14.8893 3.60635 15.1891 3.95843C15.4889 4.3105 15.5413 4.81565 15.4739 5.27412L14.7619 10.295C14.627 11.2602 13.8177 11.9712 12.8659 11.9712H4.68979C3.69307 11.9712 2.86871 11.1913 2.78627 10.181L2.09681 1.83755L0.965194 1.63855C0.665428 1.58498 0.455591 1.28648 0.50805 0.980325C0.560509 0.667284 0.852782 0.459865 1.16004 0.506554L1.08367 0.50009ZM11.6669 6.27677H9.59097C9.27622 6.27677 9.02891 6.52934 9.02891 6.8508C9.02891 7.16461 9.27622 7.42484 9.59097 7.42484H11.6669C11.9816 7.42484 12.2289 7.16461 12.2289 6.8508C12.2289 6.52934 11.9816 6.27677 11.6669 6.27677Z"
                                                                fill="currentcolor" />
                                                        </svg>
                                                    </i>
                                                    <span>
                                                        Acheter
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                            @empty
                                <div class="col-sm-6 mx-auto text-center">
                                    <div>
                                        <img width="100" height="100"
                                            src="https://img.icons8.com/pastel-glyph/100/578b07/sad.png" alt="sad" />
                                        <br>
                                        <h6>
                                            Aucun Produit
                                            @if ($key)
                                                trouvés pour <b>{{ $key }}</b>
                                            @endif
                                            .
                                        </h6>
                                    </div>
                                </div>
                            @endforelse





                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- product-area-end -->


    </main>
@endsection
