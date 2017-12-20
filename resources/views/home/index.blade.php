<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FreeLancer</title>
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
</head>
<body>
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
    <section class="freelancer mt-5">
        <div class="freelancer-wrapper">
            <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    sdsd
                </div>
                <div class="col-6 feature-freelance">
                    <div class="bg-img">
                         <img src="{{asset('img/freelancer.jpg')}}" class="img-fluid" alt="">
                    </div>
                    <h4>Our featured freelancers</h4>
                </div>
            </div>
            </div>
        </div>
    </section>
</body>
</html>