@extends('front.fixe')
@section('titre', 'Mes Favoris')
@section('body')


    <div class="page-content-wrapper">
        <div class="page-content">
            <section class="cart-area pt-150 pb-150">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            @livewire('Front.Favoris')
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>



@endsection
