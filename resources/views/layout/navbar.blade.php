
<nav class="navbar navbar-expand-sm bg-white">
            <a class="navbar-brand" href="{{url('/')}} ">
                <img src="{{asset('img/logo-bl.png')}} " alt="Logo" style="width:240px;">
            </a>
            <!-- Links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" href="{{route('mission')}} ">OFFRES DE MISSIONS</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{route('users')}} ">CHERCHER FREELANCER</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">COMMENT ÇA MARCHE ?</a>
                </li>
            </ul>
            <div class="user-info">
                @if(Auth::check())
                    <div class="img-profile" style="background-image:url('{{url(Auth::user()->image)}}')"></div>
                    <div class="dropdown">
                            <a class='dropdown-button' href='#' data-activates='userInfo'> 
                                {{Auth::user()->nom. ' ' .Auth::user()->prenom }}
                                <i class="ion-ios-arrow-down"></i>
                            </a>
                            <!-- Dropdown User -->
                            <ul id='userInfo' class='dropdown-content'>
                                <li><a href="{{route('profile',Auth::user()->id)}} ">Profile</a></li>
                                <li><a href="{{route('devis')}} ">Demande devis</a></li>
                                <li class="divider"></li>
                                <form action="{{route('logout')}}" method="post">
                                        {{ csrf_field() }}
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form> 
                            </ul>       
                    </div>
                @else
                <div>
                    <a href="{{url('login')}} ">
                            <button type="button" class="btn btn-outline-primary waves-effect">Login</button>
                    </a>
                    <a href="{{url('Signup')}}">
                            <button type="button" class="btn btn-outline-default waves-effect">SignUp</button>
                    </a>
                </div>
                @endif
            </div>
        </nav>

