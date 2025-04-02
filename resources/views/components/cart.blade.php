<div>

    @if(count($produits) > 0)
    @foreach($produits as $produit)
    <li class="minicart-item">
        <div class="thumbnail">
            <a href="#">
                <img    src="{{ asset('storage/photos/' . $produit['image']) }}"  alt="Product Images">
            </a>
        </div>
        <div class="product-content">
            <h6 class="title"><a href="#">{{ Str::limit($produit['name'], 15) }}</a></h6>

            <span class="quantity">{{ $produit['quantity'] }}  * <span class="price">{{ $produit['price'] }}</span></span>
        </div>
        <div class="close-btn">
            <button class="rbt-round-btn"><i class="feather-x"></i></button>
        </div>
    </li>

    @endforeach
@else
    <li><p>Votre panier est vide.</p></li>
@endif

    <script>
        $(document).on('click', '.quantity-control.plus', function () {
    var input = $(this).closest('.pro-qty').find('.quantity-input');
    var newVal = parseInt(input.val()) + 1;
    input.val(newVal).trigger('change'); // Trigger Livewire update
});

$(document).on('click', '.quantity-control.minus', function () {
    var input = $(this).closest('.pro-qty').find('.quantity-input');
    var newVal = parseInt(input.val()) - 1;
    if (newVal >= 0) {
        input.val(newVal).trigger('change'); // Trigger Livewire update
    }
});

    </script>
</div>
