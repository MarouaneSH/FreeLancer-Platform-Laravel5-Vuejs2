{{--  {{dd($user)}}  --}}
<nav class="navbar navbar-expand-sm bg-white">
            <a class="navbar-brand" href="#">
                <img src="{{asset('img/logo-bl.png')}} " alt="Logo" style="width:240px;">
            </a>
            <!-- Links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" href="#">OFFRES DE MISSIONS</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">CHERCHER FREELANCER</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">COMMENT ÇA MARCHE ?</a>
                </li>
            </ul>
            <div class="user-info">
                <div class="img-profile" style="background-image:url('{{asset('img/unknown.png')}}')"></div>
                <div class="dropdown">
                        <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         {{Auth::user()->nom. ' ' .Auth::user()->prenom }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">About</a>
                            <a class="dropdown-item" href="#">Messages</a>
                            <form action="{{route('logout')}}" method="post">
                                 {{ csrf_field() }}
                                <button type="submit" class="dropdown-item">Logout</button>
                          </form> 
                        </div>
                </div>
            </div>
        </nav>

