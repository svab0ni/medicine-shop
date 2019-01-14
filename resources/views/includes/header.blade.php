<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Medicine Shop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @foreach(Cache::get('categories') as $category)
                <li class="nav-item active">
                    <a class="nav-link" href="/{{ $category->slug }}">{{ $category->name }} <span class="sr-only">(current)</span></a>
                </li>
            @endforeach
        </ul>
        <form class="form-inline my-2 my-lg-0" method="GET" action="/search">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="query">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            @if(!$user = Auth::user())
                <a class="btn btn-outline-success my-2 my-sm-0" href="/login">Login</a>
                <a class="btn btn-outline-info my-2 my-sm-0" href="/register">Sign up</a>
            @else
                <a class="btn btn-outline-info my-2 my-sm-0" href="/profile">Profile <i class="fa fa-user"></i></a>
                <a class="btn btn-outline-danger my-2 my-sm-0" href="/logout">Log out</a>
            @endif
            <a class="btn btn-outline-info my-2 my-sm-0" href="/cart">Cart <i class="fa fa-shopping-cart"></i></a>
        </form>
    </div>
</nav>

<div>
    <img src="" alt="">
</div>