@extends('front.fixe')
@section('titre', 'Paiement')
@section('body')
    <main>

        <div class="rbt-breadcrumb-default ptb--100 ptb_md--50 ptb_sm--30 bg-gradient-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-inner text-center">
                            <h2 class="title">Confirmation commande</h2>
                            <ul class="page-list">
                                <li class="rbt-breadcrumb-item"><a href="#">Home</a></li>
                                <li>
                                    <div class="icon-right"><i class="feather-chevron-right"></i></div>
                                </li>
                                <li class="rbt-breadcrumb-item active">Confirmation commande</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="checkout_area bg-color-white rbt-section-gap">
            <div class="container">
                
                @if ($errors->any())
                {!! implode('', $errors->all('<div>:message</div>')) !!}
            @endif
            <form action="{{ route('order.confirm') }}" method="post">
                @csrf
                <div class="row g-5 checkout-form">
    
                    <div class="col-lg-7">
                        <div class="checkout-content-wrapper">
    
                            <!-- Billing Address -->
                            <div id="billing-form">
                                <h4 class="checkout-title">Billing Address</h4>
    
                                <div class="row">
    
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>First Name*</label>
                                        <input type="text" placeholder="First Name">
                                    </div>
    
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>Last Name*</label>
                                        <input type="text" placeholder="Last Name">
                                    </div>
    
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>Email Address*</label>
                                        <input type="email" placeholder="Email Address">
                                    </div>
    
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>Phone no*</label>
                                        <input type="text" placeholder="Phone number">
                                    </div>
    
                                    <div class="col-12 mb--20">
                                        <label>Company Name</label>
                                        <input type="text" placeholder="Company Name">
                                    </div>
    
                                    <div class="col-12 mb--20">
                                        <label>Address*</label>
                                        <input type="text" placeholder="Address line 1">
                                        <input type="text" placeholder="Address line 2">
                                    </div>
    
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>Country*</label>
                                        <div class="rbt-modern-select bg-transparent height-45">
                                            <select class="w-100">
                                                <option>Dhaka</option>
                                                <option>Barisal</option>
                                                <option>Khulna</option>
                                                <option>Comilla</option>
                                                <option>Chittagong</option>
                                            </select>
                                        </div>
                                    </div>
    
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>Town/City*</label>
                                        <input type="text" placeholder="Town/City">
                                    </div>
    
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>State*</label>
                                        <input type="text" placeholder="State">
                                    </div>
    
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>Zip Code*</label>
                                        <input type="text" placeholder="Zip Code">
                                    </div>
    
                                    <div class="col-12 mb--20">
                                        <div class="check-box">
                                            <input type="checkbox" id="create_account">
                                            <label for="create_account">Create an Acount?</label>
                                        </div>
                                        <div class="check-box">
                                            <input type="checkbox" id="shiping_address" data-shipping>
                                            <label for="shiping_address">Ship to Different Address</label>
                                        </div>
                                    </div>
    
                                </div>
    
                            </div>
    
                            <!-- Shipping Address -->
                            <div id="shipping-form" class="mt--20">
                                <h4 class="checkout-title">Shipping Address</h4>
                                <div class="row g-5">
                                    <div class="col-md-6 col-12">
                                        <label>First Name*</label>
                                        <input type="text" placeholder="First Name">
                                    </div>
    
                                    <div class="col-md-6 col-12">
                                        <label>Last Name*</label>
                                        <input type="text" placeholder="Last Name">
                                    </div>
    
                                    <div class="col-md-6 col-12">
                                        <label>Email Address*</label>
                                        <input type="email" placeholder="Email Address">
                                    </div>
    
                                    <div class="col-md-6 col-12">
                                        <label>Phone no*</label>
                                        <input type="text" placeholder="Phone number">
                                    </div>
    
                                    <div class="col-12">
                                        <label>Company Name</label>
                                        <input type="text" placeholder="Company Name">
                                    </div>
    
                                    <div class="col-12">
                                        <label>Address*</label>
                                        <input type="text" placeholder="Address line 1">
                                        <input type="text" placeholder="Address line 2">
                                    </div>
    
                                    <div class="col-md-6 col-12">
                                        <label>Country*</label>
                                        <div class="rbt-modern-select bg-transparent height-45">
                                            <select class="w-100">
                                                <option>Dhaka</option>
                                                <option>Barisal</option>
                                                <option>Khulna</option>
                                                <option>Comilla</option>
                                                <option>Chittagong</option>
                                            </select>
                                        </div>
                                    </div>
    
                                    <div class="col-md-6 col-12">
                                        <label>Town/City*</label>
                                        <input type="text" placeholder="Town/City">
                                    </div>
    
                                    <div class="col-md-6 col-12">
                                        <label>State*</label>
                                        <input type="text" placeholder="State">
                                    </div>
    
                                    <div class="col-md-6 col-12">
                                        <label>Zip Code*</label>
                                        <input type="text" placeholder="Zip Code">
                                    </div>
                                </div>
                            </div>
    
                        </div>
                    </div>
    
                    <div class="col-lg-5">
                        <div class="row pl--50 pl_md--0 pl_sm--0">
                            <!-- Cart Total -->
                            <div class="col-12 mb--60">
    
                                <h4 class="checkout-title">Cart Total</h4>
    
                                <div class="checkout-cart-total">
    
                                    <h4>Product <span>Total</span></h4>
                                    @foreach ($paniers as $id => $details)
                                    <ul>
                                       <li>{{ $details['name'] }} X {{ $details['quantity'] }} <span>{{ $details['total'] }} €</span></li> 
                                       
                                      
                                    </ul>
                                    @endforeach
    
                                    <p>Sub Total <span>{{ $total }}</span></p>
                                    <p>Shipping Fee <span>$00.00</span></p>
    
                                    <h4 class="mt--30">Grand Total <span>{{ $total }}</span></h4>
    
                                </div>
    
                            </div>
    
                            <!-- Payment Method -->
                            <div class="col-12 mb--60">
                                <h4 class="checkout-title">Payment Method</h4>
                                <div class="checkout-payment-method">
    
                                    <div class="single-method">
                                        <input type="radio" id="payment_check" name="payment-method" value="check">
                                        <label for="payment_check">Check Payment</label>
                                        <p data-method="check">Please send a Check to Store name with
                                            Store Street, Store Town, Store State, Store Postcode,
                                            Store Country.</p>
                                    </div>
    
                                    <div class="single-method">
                                        <input type="radio" id="payment_bank" name="payment-method" value="bank">
                                        <label for="payment_bank">Direct Bank Transfer</label>
                                        <p data-method="bank">Please send a Check to Store name with
                                            Store Street, Store Town, Store State, Store Postcode,
                                            Store Country.</p>
                                    </div>
    
                                    <div class="single-method">
                                        <input type="radio" id="payment_cash" name="payment-method" value="cash">
                                        <label for="payment_cash">Cash on Delivery</label>
                                        <p data-method="cash">Please send a Check to Store name with
                                            Store Street, Store Town, Store State, Store Postcode,
                                            Store Country.</p>
                                    </div>
    
                                    <div class="single-method">
                                        <input type="radio" id="payment_paypal" name="payment-method" value="paypal">
                                        <label for="payment_paypal">Paypal</label>
                                        <p data-method="paypal">Please send a Check to Store name with
                                            Store Street, Store Town, Store State, Store Postcode,
                                            Store Country.</p>
                                    </div>
    
                                    <div class="single-method">
                                        <input type="radio" id="payment_payoneer" name="payment-method" value="payoneer">
                                        <label for="payment_payoneer">Payoneer</label>
                                        <p data-method="payoneer">Please send a Check to Store name
                                            with Store Street, Store Town, Store State, Store Postcode,
                                            Store Country.</p>
                                    </div>
    
                                    <div class="single-method">
                                        <input type="checkbox" id="accept_terms">
                                        <label for="accept_terms">I’ve read and accept the terms &
                                            conditions</label>
                                    </div>
                                </div>
                                <div class="plceholder-button mt--50">
                                    <button class="rbt-btn btn-gradient hover-icon-reverse">
                                        <span class="icon-reverse-wrapper">
                                            <span class="btn-text">Place order</span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
    
                </div>
            </form>
            </div>
        </div>
    

   
    </main>
@endsection
