<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>
<body>
    <div class="container-fluid">
        <div class="main-login row">
            <div class="col-4 bg-login" style="background-image:url('img/signup.jpg')">
                <div class="bg-content">
                    <img src="{{asset('img/logo.png')}}" alt="">
                    <p class="lead">Trouvez un freelanceur Simple, rapide et 100% gratuit</p>
                </div>
                
             </div>
            <div class="col-8 signup" id="app">
             <div class="row text-right justify-content-end p-3">
                <p >vous avez pas un compte ? <a href="{{url('Signup')}}">créez votre compte gratuit</a> </p>
            </div>   
            <div class="signup-wrapper mt-5">
                    @if($errors->any())
                    <div class="alert alert-warning" role="alert">
                        <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                        </ul>
                    </div>
                    @endif
                    <h2 >Login</h2>
                    <form action="{{url('login')}}" method="post">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email" id="" aria-describedby="emailHelpId" placeholder="Votre email">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password" id="" aria-describedby="emailHelpId" placeholder="Votre Mot de passe">
                        </div>
                        <div class="form-group text-center">
                           <button class="btn-next bttn-pill bttn-md bttn-primary bttn-no-outline">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('js/app.js')}} "></script>
</body>
</html>