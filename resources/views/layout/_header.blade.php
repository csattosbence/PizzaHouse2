
<header class="site-header sticky-top py-1">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand col" href="{{ route('home.show') }}">
                    Pizza House
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse col" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto text-center">
                        <li class="card m-2 border-0"><a href="{{route('pizzas.show')}}">Pizzas</a></li>
                        <li class="card m-2 border-0"><a href="{{route('drink.show')}}">Drinks</a></li>
                        <li class="card m-2 border-0"><a href="{{route('cart.show')}}">Cart</a></li>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    @auth
                        <span>{{Auth::user()->name}}</span>
                        <form action="{{route('auth.logout')}}" method="POST">
                            @csrf
                            <button class="btn btn-sm btn-outline-danger m-sm-2" href="#">{{__('Log out')}}</button>
                        </form>
                        @if(Auth::user()->role == 'Admin')
                            <a class="btn btn-danger " href="{{route('admin.show')}}">Admin</a>
                        @endif
                    @else
                        <a class="btn btn-sm btn-outline-secondary " href="{{route('auth.login')}}">{{__('Login')}}</a>
                        <a class="btn btn-sm btn-outline-success " href="{{route('auth.register')}}">{{__('Sign Up')}}</a>
                    @endauth
                </div>
            </div>
        </nav>
    </div>
</header>
