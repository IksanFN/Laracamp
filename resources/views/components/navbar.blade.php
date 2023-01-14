<nav class="navbar navbar-expand-lg navbar-light fixed">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="/assets/images/logo.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Program</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Mentor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#pricing">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Business</a>
                </li>
            </ul>
            @auth
                <div class="d-flex user-logged nav-item dropdown no-arrow border-0">
                    <a href="#" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        Hallo, {{ Auth::user()->name }}
                        @if (Auth::user()->avatar)
                            <img src="{{ asset("assets/images/".Auth::user()->avatar ) }}" class="user-photo img-fluid" alt="" style="border-radius: 50px;">
                        @else
                            <img src="{{ asset('assets/images/user.png') }}" class="user-photo" alt="" style="border-radius: 50px;"> 
                        @endif
                        
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="right: 0; left: 0;">
                            <li>
                                <a href="{{ route('dashboard') }}" class="dropdown-item">My Dashboard</a>
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <input type="submit" class="dropdown-item" value="Logout">
                                </form>
                            </li>
                        </ul>
                    </a>
                </div>
             @else
                <div class="d-flex">
                    <a href="{{ route('login') }}" class="btn btn-master btn-secondary me-3">
                        Sign In
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-master btn-primary">
                        Sign Up
                    </a>
                </div>  
            @endauth
            
        </div>
    </div>
</nav>