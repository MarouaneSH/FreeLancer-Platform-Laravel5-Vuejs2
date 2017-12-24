<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>@yield('title')</title>
	@yield('style')
</head>

<body>
    @yield('content')

	<section class="footer">
		<footer>
			<div class="container">
				<div class="top-footer row">
					<h4 class="logo">Freelancer.com</h4>
				</div>
				<div class="bottom-footer row">
					<div class="col-8 footer-nav">
						<ul class="nav navbar-nav">
							<li>
								<a href="#">Login</a>
							</li>
							<li>
								<a href="#">Sign up</a>
							</li>
							<li>
								<a href="#">Comment ça marche ?</a>
							</li>
							<li>
								<a href="#">Contactez-nous</a>
							</li>
						</ul>
					</div>
					<div class="col-4 social text-right">
						<a href="">
							<i class="ion ion-logo-pinterest"></i>
						</a>
						<a href="">
							<i class="ion-logo-facebook"></i>
						</a>
						<a href="">
							<i class="ion-logo-twitter"></i>
						</a>
						<a href="">
							<i class="ion-logo-instagram"></i>
						</a>
					</div>
				</div>
			</div>
		</footer>
	</section>
	@yield('js')
</body>

</html>