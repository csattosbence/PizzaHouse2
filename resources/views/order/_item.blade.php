<div class="col-lg-4 col-md-6">
    <div class="card border m-3" >
        <div class="card-body row">
            <h5 class="card-title">{{_('Order Number: ')}} {{$order->id}}</h5>
            <div class="order-details col-6 }">
                <h4>{{_('Customer details:')}}</h4>
                <p class="card-text">{{$order->name}}</p>
                <p class="card-text">{{$order->email}}</p>
                <h4 class="card-text">{{_('Order Price:')}} {{$order->price}}Ft</h4>
            </div>
            <div class="ordered-items col-6">
                <h4>{{_('Ordered Items:')}}</h4>
                @foreach($order->order_items as $item)

                    <p class="card-text">{{$item->name}}</p>

                @endforeach
            </div>
        </div>
        <a href="#" class="btn btn-primary btn-block">{{_('Complete')}}</a>
        <a href="#" class="btn btn-danger btn-block">{{_('Delete')}}</a>
    </div>
</div>
