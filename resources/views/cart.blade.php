@include('partials.navbar')

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="cart-remove-url" content="{{ route('cart.remove') }}">
</head>

<h2>Your cart</h2> 

@if (empty(session('cart')) || count(session('cart')) === 0)
    <h2>You don’t have any items in cart</h2>
@else 
    @foreach (session('cart') as $id => $item)
        <div class="cart-item">
            <img src="{{ asset('images/' . $item['image']) }}" width="50"> 
            {{ $item['title'] }} - ${{ number_format($item['price'], 2) }} x {{ $item['quantity'] }}
            <strong>Total: ${{ number_format($item['price'] * $item['quantity'], 2) }}</strong>
            <button class="remove-from-cart" data-product-id="{{ $id }}">Remove</button>
        </div>
    @endforeach
@endif

<script src="{{ asset('js/remove-from-cart.js') }}"></script>

@include('partials.footer')
