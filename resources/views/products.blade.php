@include('profile.partials.navbar')

<link rel="stylesheet" href="{{asset('css/all-products.css')}}">

 <div class="container-heading">
    <h2>Products</h2>
     <p>Order it for you or for your beloved ones</p>
 </div>

<div class="container-products">
        @foreach ($products as $product)

        <a href="/products/{{$product->id}}">

    <div class="product-card">
        
        <img src="{{asset('images/' . $product->image)}}" alt="">
    
        <h2>{{$product->title}}</h2>
    
        <p>{{$product->price}} €</p>
    </div>
</a>
        @endforeach
</div>

@include('profile.partials.footer')