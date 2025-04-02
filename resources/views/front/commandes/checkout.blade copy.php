@extends('front.fixe')
@section('titre', 'Paiement')
@section('body')
    <main>

        {{--
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('css/form.css') }}">
        <section class="tp-checkout-area pb-150 pt-150">

            <div class="container">
                <div class="row">


                    <div class="col-lg-7">
                        <div class="tp-checkout-bill-area">
                            <h3 class="tp-checkout-bill-title">Les informations personnelles</h3>
                            <div class="tp-checkout-bill-form">

                                @if ($errors->any())
                                    {!! implode('', $errors->all('<div>:message</div>')) !!}
                                @endif
                                <form action="{{ route('order.confirm') }}" method="post">
                                    @csrf
                                    <div class="d-flex justify-content-center pagination-lg">
                                        <div class="customer-details">
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-grp">
                                                        <label for="">Nom :</label><span class="error-message"
                                                            id="name-error"></span><br>
                                                        <input type="text" class="form-control" name="nom"
                                                            value="{{ Auth::user()->nom }}" id="fname">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-grp">
                                                        <label for="">Prénom :</label><span class="error-message"
                                                            id="name-error"></span><br>
                                                        <input type="text" class="form-control" name="prenom"
                                                            value="{{ Auth::user()->prenom }}" id="fname">
                                                    </div>
                                                </div>
                                                <div class="form-grp">
                                                    <label for="">Email :</label><span class="error-message"
                                                        id="email-error"></span><br>
                                                    <input type="text" class="form-control" name="email"
                                                        value="{{ Auth::user()->email }}" id="email">
                                                </div>
                                                <div class="form-grp">
                                                    <label for="">Address :</label><span class="error-message"
                                                        id="address-error"></span><br>
                                                    <textarea name="adresse" class="form-control" id="adresse" cols="30" rows=""></textarea>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="tp-checkout-input">
                                                        <label>Pays</label>
                                                        <input name="pays" type="text" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="tp-checkout-input">
                                                        <label>Gouvernorat</label>
                                                        <input name="gouvernorat" type="text" placeholder="">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="tp-checkout-input">
                                                        <label>Phone <span>*</span></label>
                                                        <input name="phone" type="text" placeholder="">
                                                    </div>
                                                </div>




                                                <div class="col-md-12">
                                                    <div class="tp-checkout-input">
                                                        <label for="">Order notes (optional)</label>
                                                        <textarea name="note" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>


                                    {{--  <div class="d-flex justify-content-center pagination-lg">

                                    <input type="submit" class="btn btn-warning check-btn" value="Confirm Order">
                                </div> --}}
                                    {{-- </form> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <!-- checkout place order -->
                        <div class="tp-checkout-place">
                            <h3 class="tp-checkout-place-title">Votre commande</h3>
                            <div class="tp-order-info-list">
                                <ul>

                                    <!-- header -->
                                    <li class="tp-order-info-list-header">
                                        <h4>Produit</h4>
                                        <h4></h4>
                                        <h4>Total</h4>
                                    </li>
                                    @foreach ($paniers as $id => $details)
                                        <!-- item list -->
                                        <li class="tp-order-info-list-desc">
                                            <p>
                                                <b>{{ $details['nom'] }}</b>
                                                <span> x {{ $details['quantite'] }}</span>
                                            </p>
                                            <span>{{ $details['total'] }} DT</span>
                                        </li>
                                    @endforeach


                                    <!-- subtotal -->
                                    <li class="tp-order-info-list-subtotal">
                                        <b>Sous total</b>
                                        <span>{{ $total }} DT</span>
                                    </li>


                                    <!-- shipping -->
                                    <li class="tp-order-info-list-shipping">
                                        <b>Frais de livraison </b>
                                        <div class="tp-order-info-list-shipping-item d-flex flex-column align-items-end">
                                            <span>
                                                <span>{{ $configs->frais ?? 0 }} DT</span>
                                            </span>
                                        </div>
                                    </li>

                                    <!-- total -->
                                    <li class="tp-order-info-list-total">
                                        <b>Total</b>
                                        <span>{{ $total + $configs->frais ?? 0 }} DT</span>
                                    </li>
                                </ul>


                            </div>

                            <div class="tp-checkout-btn-wrapper">
                                <input type="submit" class="tp-btn-theme text-center w-100 check-btn"
                                    value="Confirmer la commande">
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>

        </section>




<style>
    .form-control{
        color: black !important;
        text-align: left !important;
        padding-left: 10px !important;
    }
</style>

    </main>
@endsection
