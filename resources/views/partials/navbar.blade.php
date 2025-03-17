<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/nav-bar.css')}}">
    <title>Document</title>
</head>
<body>
    <section class="nav-bar">
    <div class="left-placeholder"></div>   
            <ul>
                <li><a href="/">Sākums</a></li>
                <li><a href="/products">Produkti</a></li>
                <li><a href="#">Par mums</a></li>
            </ul>  
        <div class="nav-icons">
            <div class="dropdown">
                <div class="profile-icon"> <img src="{{asset('images/Profile.png')}}" alt="" class="dropimg">
                    <div class="dropdown-content">
                        <a href="sign-up.php">Reģistrēties</a>
                        <a href="log-in.php">Logoties</a>
                    </div>
                </div>
            </div>
            <div class="cart-icon">
                <a href="/cart"><img src="{{asset('images/Cart.png')}}" alt=""></a>
            </div>
        </div>
    </section>
</body>
</html>