<header>
    <div class="row mt-3">
        <div class="col-sm-5 ml-5 text-center">
           <a href="{{route('about')}}">| About |</a>
        </div>
        <div class="col-sm-5">
            <a href="{{route('home')}}">| Generate new link |</a>
        </div>
        <div class="col-sm-1 auth">
            @if(Auth::user())
                <div class="dropdown">
                    <div type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Menu
                    </div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="{{route('show.links')}}">My Links</a>
                        @if(Auth::user()->role == 2)
                            <a class="dropdown-item" href="{{route('show.all.links')}}" style="color:gold;font-size:20px; ">All Links</a>
                            <a class="dropdown-item" href="" style="color:gold;font-size:16px; ">Generator Settings</a>
                            <a class="dropdown-item" href="{{route('show.all.users')}}" style="color:gold;font-size:20px; ">Users</a>
                        @endif
                    </div>
                </div>
            @else
                <a href="{{route('login')}}">Sign Up</a>
            @endif
        </div>

</header>
