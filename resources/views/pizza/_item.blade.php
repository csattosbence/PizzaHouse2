<div class="col-md-6 ">
    <div class="card m-5">
        <img class="card-img-top" src="..." alt="Card image cap">
        <div class="card-body text-center">
            <h5 class="card-title">{{$pizza->name}}</h5>
            <p class="card-text">{{$pizza->description}}</p>
            <p class="card-text">{{$pizza->price}} Ft</p>
            <p class="card-text"></p>
        </div>
        <a href="{{route('cart.addToCart',['id' =>$pizza->id])}}" class="btn btn-primary btn-block">{{_('Add To Cart')}}</a>
    </div>
</div>
