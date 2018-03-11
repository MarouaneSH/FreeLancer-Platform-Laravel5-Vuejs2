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
					<h4 class="logo">
					<img src="{{asset('img/logo-ft.png')}}" width="220px" alt="">
					</h4>
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

	<div class="loading">
			<svg width="80px" height="80px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-infinity"
			style="background: none;">
				<path fill="none" d="M24.3,30C11.4,30,5,43.3,5,50s6.4,20,19.3,20c19.3,0,32.1-40,51.4-40 C88.6,30,95,43.3,95,50s-6.4,20-19.3,20C56.4,70,43.6,30,24.3,30z"
				stroke="#ffff" stroke-width="2" stroke-dasharray="2.5658892822265624 2.5658892822265624">
					<animate attributeName="stroke-dashoffset" calcMode="linear" values="0;256.58892822265625" keyTimes="0;1" dur="0.2" begin="0s"
					repeatCount="indefinite"></animate>
				</path>
			</svg>
			<h4>Chargement....</h4>
		</div>
		
	@yield('js')
</body>

</html>