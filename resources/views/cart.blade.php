@include('partials.navbar')

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="cart-remove-url" content="{{ route('cart.remove') }}">
</head>

<link rel="stylesheet" href="{{asset('css/cart.css')}}">

<html>
    <body>
        <div class="wrapper">
            @if (empty(session('cart')) || count(session('cart')) === 0)
                <h2>You don’t have any items in cart</h2>
            @else 

            @php
                $grandTotal = 0;
            @endphp

                <h2>Your cart items</h2>
                <a href="/products">Back to shopping</a>

        <div class="cart-container">
            <div class="cart-head">
                <p>Product</p>
                <p>Price</p>
                <p>Quantity</p>
                <p>Total</p>
            </div>
            <hr>
            
            @foreach (session('cart') as $id => $item)

            @php
                $itemTotal = $item['price'] * $item['quantity'];
                $grandTotal = $grandTotal + $itemTotal;
            @endphp

                <div class="cart-item">

                    <div class="product">
                        {{-- product collumn --}}
                        <img src="{{ asset('images/' . $item['image']) }}"> 
                        <div class="product-info">
                            <p>{{ $item['title'] }}</p>
                            <button class="remove-from-cart" data-product-id="{{ $id }}">Remove</button>
                        </div>
                    </div>

                    <div class="price">
                        <p>$ {{ number_format($item['price'], 2) }}</p>  
                    </div>
                    
                    <div class="quantity">
                        <p>{{ $item['quantity'] }}</p> 
                    </div>

                    <div class="total">
                    <p>$ {{ number_format($item['price'] * $item['quantity'], 2) }}</p>
                    </div>
                </div>
                <hr>
            @endforeach
            </div>

            
        <div class="total-container">
            <div class="cart-total"> 
                <p>Sub-total</p>
                <p>$ {{number_format($grandTotal, 2)}}</p>
            </div>
            
            <div class="cart-total-btn">
                <button><a href="/cart/check-out">Check-out</a></button>
            </div>
        </div>

        @endif
        <script src="{{ asset('js/remove-from-cart.js') }}"></script>
        </div>

    @include('partials.footer')

    </body>
</html>
