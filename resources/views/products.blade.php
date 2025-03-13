@include('partials.navbar')

<link rel="stylesheet" href="{{asset('css/all-products.css')}}">

<section class="products-container">

    <div class="container-heading">
        <h2>Products</h2>
        <p>Order it for you or for your beloved ones</p>
    </div>

    @foreach ($products as $product)

    <img src="{{ asset('images/' . $product->image) }}" alt="">

    <h1><a href="/products/{{$product->id}}">{{$product->title}}</a></h1>

    <h2>{{$product->price}}</h2>

    <hr>
@endforeach
</section>

@include('partials.footer')