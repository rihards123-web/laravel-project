<head>
    <link rel="stylesheet" href="{{asset('css/payment.css')}}">
</head>

@include('partials.navbar');

<html>
    <body>
        <div class="wrapper">

            <div class="payment-container">   
                
                <div class="payment-header">
                    <div class="payment-head">
                        <img src="{{asset('images/CreditCardFill.png')}}" alt="">
                        <h3>Credit Card</h3>
                    </div>
                </div>
                
                <div class="payment-card">
                    <div class="card">
                        <input type="text" name="" id="card-number" maxlength="19" placeholder="Card Number" required>
                        <input type="text" name="" id="holder-name" placeholder="Holder Name" required>
                    </div>
                
                    <div class="expiry">
                        <input type="text" name="" id="expiry" placeholder="Experation MM/YY" maxlength="5" required>
                        <input type="text" name="" id="cvv"  placeholder="CVV" required>
                    </div>
                </div>
                
                <div class="buttons">
                    <button class="back-to-checkout"><a href="/cart/check-out">Back to details</a></button>
                    <button class="go-to-payment"><a href="#">Go to payment</a></button>
                </div>

            </div>
        </div>
    </body>
</html>



