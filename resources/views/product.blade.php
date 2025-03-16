@include('partials.navbar')
<link rel="stylesheet" href="{{asset('css/single-product.css')}}">

<html>
    <body>
        <div class="wrapper">
            <div class="container">
                
                <div class="container-left">
                    <div class="product-image">
                        <img src="{{asset('images/' . $product->image) }}" alt="{{ $product->title }}">
                    </div>
                    <p class="product-subtext">Selected with care for best customer experience</p>
                    <p class="free-shipping">🚚 <strong>FREE SHIPPING</strong></p>
                </div>
                
                <!-- Right Section: Product Info & Purchase Options -->
                <div class="container-right">
                    <h1 class="product-title">{{ $product->title }}<sup>®</sup></h1>
                    
            
                    <div class="price-cart">
                        <p class="product-price"><span class="basePrice">{{ number_format($product->price, 2) }} $</span></p>

                        <div class="quantity-container">
                            <button class="quantity-btn decrement">-</button>
                            <span class="quantity-value">1</span>
                            <button class="quantity-btn increment">+</button>
                        </div>
                        
                      
                        <button class="add-to-cart">
                            🛒 + Add to cart
                        </button>
                    </div>
                  
                    <script src="{{asset('js/quantity.js')}}"> </script>
                    
                    <div class="product-description">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>
                            Tempore deleniti quo numquam aliquid eius eveniet, at aspernatur. <br>
                            Repudiandae dicta hic, ullam, nesciunt <br>
                            At ipsam libero deleniti quasi autem ad dolores.</p>
                    </div>
                </div>
            </div>
            @include('partials.footer')
            </div>
    </body>   
</html>


