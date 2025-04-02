
<main class="main-wrapper">
    @php

$configs = DB::table('settings')->first();
@endphp

  

<div class="rbt-cart-area bg-color-white rbt-section-gap">
    <div class="cart_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="#">
                        <!-- Cart Table -->
                        <div class="cart-table table-responsive mb--60">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="pro-thumbnail">Image</th>
                                        <th class="pro-title">Product</th>
                                        <th class="pro-price">Price</th>
                                        <th class="pro-quantity">Quantity</th>
                                        <th class="pro-subtotal">Total</th>
                                        <th class="pro-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>

                                   @forelse ($paniers ?? [] as $id => $details)
                            <tr data-id="{{ $id }}">
                                        <td class="pro-thumbnail"><a href="#"><img src="{{ asset('storage/photos/' . $details['image']) }}" alt="Product"></a></td>
                                        <td class="pro-title"><a href="{{ route('details-produits', ['id' => $details['product_id'], 'slug'=>Str::slug(Str::limit($details['name'], 50))]) , }}"> {{ $details['name'] }}</a></td>
                                        <td class="pro-price"><span> {{ $details['price'] }}</span></td>
                                        <td class="pro-quantity">
                                            <div class="pro-qty">
                                                
                                                <input 
                                                type="number" 
                                                min="1" 
                                                value="{{ $details['quantity'] }}" 
                                                wire:change="updateQuantity({{ $details['product_id'] }}, $event.target.value)"
                                            />
                                              
                                                 
                                            
                                            </div>
                                        </td>
                                        <td class="pro-subtotal"><span>{{ $details['price'] * $details['quantity'] }}</span></td>
                                        <td class="pro-remove"><a  wire:click="delete({{ $details['product_id'] }})"href="#"><i class="feather-x"></i></a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6">
                                            <div class="text-center p-5">
                                                <img width="64" height="64" src="https://img.icons8.com/pastel-glyph/64/578b07/shopping-cart--v2.png" alt="shopping-cart--v2" /><br>
        
                                                <h6>
                                                    
                                                    Vous n\'avez pas de produits au panier
                                                </h6>
                                                <br>
        
                                            </div>
                                        </td>
                                    </tr>
                                    @endforelse
                                
                                
                                </tbody>
                            </table>
                        </div>
                    </form>

                    <div class="row g-5">

                        <div class="col-lg-6 col-12">

                      
                            <!-- Discount Coupon -->
                      {{--       <div class="discount-coupon edu-bg-shade">
                                <div class="section-title text-start">
                                    <h4 class="title mb--30">Discount Coupon Code</h4>
                                </div>
                                <form action="#">
                                    <div class="row">
                                        <div class="col-md-6 col-12 mb--25">
                                            <input type="text" placeholder="Coupon Code">
                                        </div>
                                        <div class="col-md-6 col-12 mb--25">
                                            <button class="rbt-btn btn-gradient hover-icon-reverse btn-sm">
                                                <span class="icon-reverse-wrapper">
                                                    <span class="btn-text">Apply Code</span>
                                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div> --}}
                        </div>
                        <!-- Cart Summary -->

                        <div class="col-lg-5 offset-lg-1 col-12">
                            <div class="cart-summary">
                                <div class="cart-summary-wrap">
                                    <div class="section-title text-start">
                                        <h4 class="title mb--30">Cart Summary</h4>
                                    </div>
                                    <p>Sub Total <span>{{ $total }} <x-devise></x-devise> </span></p>
                                    <p>Shipping Cost <span>00</span></p>
                                    <h2>Grand Total <span>{{ $total  }} <x-devise></x-devise> </span></h2>
                                </div>

                                <div class="cart-submit-btn-group">
                                    <div class="single-button w-100">
                                      
                                        <a  class="rbt-btn btn-gradient rbt-switch-btn rbt-switch-y w-100" href="{{ url('/commander') }}"> Passer le commande</a>
                       
                                    </div>

                                    <x-button label="{{ auth()->check() ? __('I order') : __('Log in to order') }}" icon-right="c-arrow-right" link="{{ route('order.index') }}" class="btn-primary btn-sm" />
                                   
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
   
</main>

