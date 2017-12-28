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
                    <li><a href="">Login</a> </li>
                    <li><a href="">Sign up</a></li>
                    <li><a href="">How it works ?</a> </li>
                </ul>
            </nav>
           <button class="btn-started bttn-material-flat bttn-lg bttn-default bttn-no-outline">
            <a href="" >
               Get started
            </a>
            </button> 
        </div>
    </div>
    <section class="missions">
        <div class="container">
            <div class="missions-wrapper text-center">
                <h2>OUR LAST MISSIONS </h2>
                <div class="last-missions">
                    <table class="table mt-4">
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
                            <tr>
                                <th scope="row">Application Mobile </th>
                                <td>
                                    <span>Distance</span>
                                </td>
                                <td class="categorie">
                                   <span> Web</span>
                                </td>
                                <td>5</td>
                                <td class="price">600 DH</td>
                                <td>
                                    <button class="bttn-material-flat bttn-sm bttn-default bttn-no-outline">
                                        <a href="">Voir mission</a>
                                    </button>
                                </td>
                            </tr>

                            <tr class="odd">
                                <th scope="row">Application Mobile </th>
                                <td>
                                    <span>Distance</span>
                                </td>
                                <td class="categorie">
                                   <span> IT & Resaux </span>
                                </td>
                                <td>5</td>
                                <td class="price">600 DH</td>
                                <td>
                                    <button class="bttn-material-flat bttn-sm bttn-default bttn-no-outline">
                                        <a href="">Voir mission</a>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Application Mobile </th>
                                <td>
                                    <span>Distance</span>
                                </td>
                                <td class="categorie">
                                   <span> Design </span>
                                </td>
                                <td>5</td>
                                <td class="price">600 DH</td>
                                <td>
                                    <button class="bttn-material-flat bttn-sm bttn-default bttn-no-outline">
                                        <a href="">Voir mission</a>
                                    </button>
                                </td>
                            </tr>
                            <tr class="odd">
                                <th scope="row">Application Mobile </th>
                                <td>
                                    <span>Distance</span>
                                </td>
                                <td class="categorie">
                                   <span> Développement Mobile </span>
                                </td>
                                <td>5</td>
                                <td class="price">600 DH</td>
                                <td>
                                    <button class="bttn-material-flat bttn-sm bttn-default bttn-no-outline">
                                        <a href="">Voir mission</a>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Application Mobile </th>
                                <td>
                                    <span>Distance</span>
                                </td>
                                <td class="categorie">
                                   <span> Mobile </span>
                                </td>
                                <td>5</td>
                                <td class="price">600 DH</td>
                                <td>
                                    <button class="bttn-material-flat bttn-sm bttn-default bttn-no-outline">
                                        <a href="">Voir mission</a>
                                    </button>
                                </td>
                            </tr>
                            <tr class="odd">
                                <th scope="row">Application Mobile </th>
                                <td>
                                    <span>Distance</span>
                                </td>
                                <td class="categorie">
                                   <span> Développement Mobile </span>
                                </td>
                                <td>5</td>
                                <td class="price">600 DH</td>
                                <td>
                                    <button class="bttn-material-flat bttn-sm bttn-default bttn-no-outline">
                                        <a href="">Voir mission</a>
                                    </button>
                                </td>
                            </tr>

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
                        <div class="single-freelance row">
                            <div class="col-md-2">
                               <img src="{{asset('img/user.jpg')}}" class="img-fluid freelance-img" alt="">                               
                            </div>
                            <div class="col-md-6 freelancer-info">
                                <p class="lead">Hello This is my Biographie</p>
                                <div class="info">
                                      <i class="ion-ios-navigate-outline"></i>
                                       <span> Agadir, Morocco </span>
                                </div>
                                <div class="info">
                                    <i class="ion-ios-star-outline"></i>
                                    <span>Rating 4.5/5 </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button class="bttn-material-flat bttn-sm bttn-default bttn-no-outline">
                                        <a href="">Hire now</a>
                                    </button>
                            </div>
                        </div>
                        <div class="single-freelance row">
                            <div class="col-md-2">
                               <img src="{{asset('img/user.jpg')}}" class="img-fluid freelance-img" alt="">                               
                            </div>
                            <div class="col-md-6 freelancer-info">
                                <p class="lead">Hello This is my Biographie</p>
                                <div class="info">
                                      <i class="ion-ios-navigate-outline"></i>
                                       <span> Agadir, Morocco </span>
                                </div>
                                <div class="info">
                                    <i class="ion-ios-star-outline"></i>
                                    <span>Rating 4.5/5 </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button class="bttn-material-flat bttn-sm bttn-default bttn-no-outline">
                                        <a href="">Hire now</a>
                                    </button>
                            </div>
                        </div>
                        <div class="single-freelance row">
                            <div class="col-md-2">
                               <img src="{{asset('img/user.jpg')}}" class="img-fluid freelance-img" alt="">                               
                            </div>
                            <div class="col-md-6 freelancer-info">
                                <p class="lead">Hello This is my Biographie</p>
                                <div class="info">
                                      <i class="ion-ios-navigate-outline"></i>
                                       <span> Agadir, Morocco </span>
                                </div>
                                <div class="info">
                                    <i class="ion-ios-star-outline"></i>
                                    <span>Rating 4.5/5 </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button class="bttn-material-flat bttn-sm bttn-default bttn-no-outline">
                                        <a href="">Hire now</a>
                                    </button>
                            </div>
                        </div>  
                        <div class="single-freelance row">
                            <div class="col-md-2">
                               <img src="{{asset('img/user.jpg')}}" class="img-fluid freelance-img" alt="">                               
                            </div>
                            <div class="col-md-6 freelancer-info">
                                <p class="lead">Hello This is my Biographie</p>
                                <div class="info">
                                      <i class="ion-ios-navigate-outline"></i>
                                       <span> Agadir, Morocco </span>
                                </div>
                                <div class="info">
                                    <i class="ion-ios-star-outline"></i>
                                    <span>Rating 4.5/5 </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button class="bttn-material-flat bttn-sm bttn-default bttn-no-outline">
                                        <a href="">Hire now</a>
                                    </button>
                            </div>
                        </div>
                        <div class="single-freelance row">
                            <div class="col-md-2">
                               <img src="{{asset('img/user.jpg')}}" class="img-fluid freelance-img" alt="">                               
                            </div>
                            <div class="col-md-6 freelancer-info">
                                <p class="lead">Hello This is my Biographie</p>
                                <div class="info">
                                      <i class="ion-ios-navigate-outline"></i>
                                       <span> Agadir, Morocco </span>
                                </div>
                                <div class="info">
                                    <i class="ion-ios-star-outline"></i>
                                    <span>Rating 4.5/5 </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button class="bttn-material-flat bttn-sm bttn-default bttn-no-outline">
                                        <a href="">Hire now</a>
                                    </button>
                            </div>
                        </div>
                      
                   </div>
                </div>
                <div class="col-6 feature-freelance" style="background-image:url('{{asset('img/freelancer.jpg')}}')">
                    <h4>
                        <span>Our featured freelancers</span>
                        <button class="d-block bttn-slant bttn-lg bttn-warning bttn-no-outline">
                            <a href="">See More</a>
                        </button>
                    </h4>
                </div>
            </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
	<script src="{{asset('js/app.js')}}"></script>
@endsection