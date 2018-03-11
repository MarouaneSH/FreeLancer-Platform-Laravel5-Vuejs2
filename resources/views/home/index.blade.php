@extends('layout.app')
@section('title','Trouver des freelancers en ligne')

@section('style')
   <link rel="stylesheet" href="{{mix('css/home.css')}} ">
@endsection


@section('content')
    <div class="main-bg">
        <div class="bg-wrapper">
            @include('home/background')
            <nav class="top-menu">
                <ul>
                    <li><a href="{{url('login')}}">Login</a> </li>
                    <li><a href="{{url('Signup')}}">Sign up</a></li>
                    <li><a href="">How it works ?</a> </li>
                </ul>
            </nav>
            <span class="typed"></span>
            <a href="{{url('Signup')}} " class="btn-started black-text white waves-effect waves-light btn" >
               Get started
            </a>
        </div>
    </div>
    <section class="missions">
        <div class="container">
            <div class="missions-wrapper text-center">
                    <div class="card card-mission light-blue darken-2 white-text">
                            <div class="card-content white-text">
                              <span class="card-title">NOS DERNIÈRE MISSION</span>
                            </div>
                    </div>
                <div class="last-missions">
                    <table class="table mt-4 centered highlight">
                        <thead>
                            <tr>
                            <th scope="col">MISISON</th>
                            <th scope="col">TYPE</th>
                            <th scope="col">CATEGORIES</th>
                            <th scope="col">DEVIS</th>
                            <th scope="col">BUDGET</th>
                            <th scope="col">VIEW</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($missions as $mission)
                                    <tr>
                                        <th scope="row">{{$mission->titre_mission}} </th>
                                        <td>
                                            <span>{{$mission->type_mission}}</span>
                                        </td>
                                        <td class="categorie">
                                         @php
                                             $categorie = DB::table('categories')->where('categorie_id','=',$mission->categorie_id)->first();  
                                         @endphp
                                        <span> {{$categorie->categorie_name}} </span>
                                        </td>
                                        <td>5</td>
                                        <td class="price">{{$mission->min_budget}} - {{$mission->max_budget}} DH</td>
                                        <td>
                                            <button class="bttn-material-flat bttn-sm bttn-default bttn-no-outline">
                                                <a href="{{route('singleMission',$mission->mission_id)}} ">Voir mission</a>
                                            </button>
                                        </td>
                                    </tr>
                            @endforeach

                        </tbody>
                  </table>
                </div>
            </div>
        </div>
    </section>
    <section class="freelancer m-5">
        <div class="freelancer-wrapper">
            <div class="container-fluid">
            <div class="row">
                <div class="col-6 last-freelacner">
                   <div class="freelancer-list ">
                        @foreach ($users as $user)
                        <div class="single-freelance row">
                            <div class="col-md-2">
                               <img src="{{asset($user->image)}}" class="img-fluid freelance-img" alt="">                               
                            </div>
                            <div class="col-md-6 freelancer-info">
                                <p class="lead">{{$user->biographie}} </p>
                                <div class="info">
                                      <i class="ion-ios-navigate-outline"></i>
                                       <span> {{$user->location}} </span>
                                </div>
                                <div class="info">
                                    <i class="ion-ios-star-outline"></i>
                                    @php
                                        $userRating = DB::table('USER_RATINGS')
                                        ->where('rated_user',$user->id)
                                        ->avg('vote');  
                                    @endphp
                                    @if($userRating)
                                           <span>  {{ number_format($userRating,1 )}} </span>
                                    @else
                                         <span>  1.0 </span>                                    
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button class="bttn-material-flat bttn-sm bttn-default bttn-no-outline">
                                        <a href="{{url('profile/'.$user->id)}}">Voir Profile</a>
                                    </button>
                            </div>
                        </div>
                        @endforeach
                      
                   </div>
                </div>
                <div class="col-6 feature-freelance" style="background-image:url('{{asset('img/freelancer.jpg')}}')">
                    <h4>
                        <span>NOS MEILLEURE FREELANCERS</span>
                            <a class="d-block btn btn-amber">Voir plus</a>
                    </h4>
                </div>
            </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{mix('js/typed.js')}}"></script>
@endsection