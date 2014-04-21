@section("header")
    <div class="header">
        <div class="container">
            <h1>Tutorial</h1>
            @if (Auth::check())
                <a href="{{ URL::route('logout') }}">logout</a>
                |
                <a href="{{ URL::route('users/dashboard') }}">profile</a>
            @else
                <a href="{{ URL::route('home') }}">login</a>
            @endif
        </div>
    </div>
@show