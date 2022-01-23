<div class="col-md-6">
    <div class="card">
        <img class="card-img-top" src="..." alt="Card image cap">
        <div class="card-body text-center">
            <h5 class="card-title">{{$product['item']->name}}</h5>
            <p class="card-text"> Quantity: {{$product['qty']}}</p>
            <p class="card-text">Total Price: {{$product['price']}}</p>
            <div class="row">
                <a class="btn btn-primary col" href="{{route('cart.increaseQuantity',['id'=> $product['item']->id])}}">
                    +
                </a>
                <a class="btn btn-danger col" href="{{route('cart.decreaseQuantity',['id'=>$product['item']->id])}}">
                    -
                </a>
            </div>
        </div>
    </div>
</div>
