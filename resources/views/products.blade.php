@include('partials.navbar')

@foreach ($products as $product)

    <h1><a href="/products/{{$product->id}}">{{$product->title}}</a></h1>

    <h2>{{$product->price}}</h2>

    <h2>{{$product->description}}</h2>

    <hr>
@endforeach

@include('partials.footer')