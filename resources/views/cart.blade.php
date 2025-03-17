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

        <div class="cart-container">
            <div class="cart-head">
                <p>Product</p>
                <p>Price</p>
                <p>Quantity</p>
                <p>Total</p>
            </div>

            @foreach (session('cart') as $id => $item)
                <div class="cart-item">
                    <div class="product">
                        <img src="{{ asset('images/' . $item['image']) }}" width="50"> 
                        {{ $item['title'] }} 
                        <button class="remove-from-cart" data-product-id="{{ $id }}">Remove</button>
                    </div>

                    <div class="price">
                        {{ number_format($item['price'], 2) }}  
                    </div>
                    
                    <div class="quantity">
                        {{ $item['quantity'] }} 
                    </div>

                    <div class="total">
                    {{ number_format($item['price'] * $item['quantity'], 2) }}
                    </div>
                
                </div>
            </div>
            @endforeach
        @endif
        <script src="{{ asset('js/remove-from-cart.js') }}"></script>
        </div>

    @include('partials.footer')

    </body>
</html>
