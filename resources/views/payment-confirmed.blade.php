@include('profile.partials.navbar')

<link rel="stylesheet" href="{{asset('css/payment-confirmed.css')}}">
<html>
    <body>
        <div class="wrapper">
            <div class="container">

                <div class="image-container">
                    <img src="{{asset('images/CheckCircle.png')}}" alt="" >
                </div>

                <div class="header-container">
                    <h2>Payment Confirmed</h2>
                    <p>ORDER #2132</p>
                </div>

                <div class="desc-container">
                    <p>Thank you for buying from Storefront. The nature is grateful to you. <br>
                       Now that your order is confirmed it will be ready to ship in 2 days. <br>
                       Please check your inbox in the future for your order updates.</p>
                </div>

                <div class="button">
                    <button class="back-to-shopping"><a href="/products">Back to shopping</a></button>
                </div>

            </div>
        </div>
    </body>
</html>