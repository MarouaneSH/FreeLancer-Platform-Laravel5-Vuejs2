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
            <div class="col-8 signup">
                <div class="signup-wrapper">
                    <h2 >Créer un compte</h2>
                    <form action="">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="" id="" aria-describedby="emailHelpId" placeholder="Votre email">
                        </div>
                        <div class="form-group">
                            <label for="">Nom</label>
                            <input type="Nom" class="form-control" name="" id="" aria-describedby="emailHelpId" placeholder="Votre Nom">
                        </div>
                        <div class="form-group">
                            <label for="">Prenom</label>
                            <input type="Prenom" class="form-control" name="" id="" aria-describedby="emailHelpId" placeholder="Votre Prenom">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>