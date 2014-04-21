@section("header")
            @if (Auth::check())
                <li><a href="{{ URL::route('logout') }}" class="smothscroll">logout</a></li>
                <li><a href="{{ URL::route('users/dashboard') }}" class="smothscroll">profile</a></li>
            @else
                <li><a href="{{ URL::route('home') }}" class="smothscroll">login</a></li>
            @endif
@show