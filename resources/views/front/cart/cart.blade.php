@extends('front.fixe')
@section('titre', 'Mon panier')
@section('body')
<main>


    <a class="close_side_menu" href="javascript:void(0);"></a>

    <!-- Start breadcrumb Area -->
    <div class="rbt-breadcrumb-default ptb--100 ptb_md--50 ptb_sm--30 bg-gradient-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-center">
                        <h2 class="title">Cart</h2>
                        <ul class="page-list">
                            <li class="rbt-breadcrumb-item"><a href="index.html">Home</a></li>
                            <li>
                                <div class="icon-right"><i class="feather-chevron-right"></i></div>
                            </li>
                            <li class="rbt-breadcrumb-item active">Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Cart area start-->
       {{--  <section class="cart-area pt-150 pb-150">

            <div class="container">
                <div class="row ">
                    <div class="col-12 cart"> --}}

                     @livewire('Front.Panier')


                   
                    {{-- 
                </div>
            </div>
        </section> --}}
    </main>
@endsection
