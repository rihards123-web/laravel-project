

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/landing-page.css')}}">
    <title>Best shopping centre</title>
</head>
<body>

    @include('profile.partials.navbar')

    <section class="landing">
        <div class="center-container">
            <h2>All your shopping needs satisfied</h2>
            <h4>Take time to browse our select in-store goods. Enjoy your shopping <br> experience with Storefront!</h4>
            <button><a href="/products">Discover our collection</a></button>
        </div>
    </section>

    <section class="product-display">

        <div class="container-heading">
            <h2>Products</h2>
             <h3>Order it for you or for your beloved ones</h3>
         </div>

        <div class="container-products">
            @foreach ($products->take(8) as $product)
    
            <a href="/products/{{$product->id}}">
    
        <div class="product-card">
            
            <img src="{{asset('images/' . $product->image)}}" alt="">
        
            <h2>{{$product->title}}</h2>
        
            <p>{{$product->price}} €</p>
        </div>
    </a>
            @endforeach
    </div>
    </section>
    
    <section class="deals">
        <div class="deals-left">
            <h2>Exclusive deals<br>and offers</h2>
            <h4>Made for your covenience</h4>
            <p><img src="{{asset('images/checkmark-circle-outline 1.png')}}" alt=""><strong>Eco-sustainable:</strong> All recyclable materials, 0% CO2 emissions</p>
            <p><img src="{{asset('images/checkmark-circle-outline 1.png')}}" alt=""><strong>Hypoallergenic:</strong> 100% natural, human friendly ingredients </p>
            <p><img src="{{asset('images/checkmark-circle-outline 1.png')}}" alt=""><strong>Trendy:</strong> accesorries and clothing items as seen in latest trends</p>
            <button>Learn More</button>
        </div>
        <div class="deals-right">
            <img src="{{asset('images/stock.png')}}" alt="">
        </div>
    </section>

    @include('profile.partials.footer')

</body>
</html>

