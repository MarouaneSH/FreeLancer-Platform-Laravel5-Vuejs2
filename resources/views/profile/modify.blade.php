@extends('layout.app')

@section('title','Modify Freelancer Profile')
@section('style')
	<link rel="stylesheet" href="{{mix('css/profile.css')}} ">
	<link rel="stylesheet" href="{{mix('css/modify-profile.css')}} ">
@endsection

@section('content')
	@include('profile.layout.navbar')

	<div class="container">
		<div class="row justify-content-end mt-5 mb-3 pr-3">
			<button id="btn-modify" class="bttn-fill bttn-md bttn-primary bttn-no-outline">
			<a href="{{route('modifyProfile')}}">MODIFIER VOTRE PROFILE</a>	
			</button>
		</div>
		<div class="profil-wrapper row ">
			<div class="col-4">
				<div class="user-info card p-2">
					<h4 class="card-title ml-0">
						Information
					</h4>
					<div class="top-user-info">
						<div class="img-user" style="background-image:url('{{asset('img/unknown.png')}}')"></div>
						<h4>Marouane SH</h4>
					</div>
					<div class="bottom-user-info">
						<div class="row align-items-center">
							<div class="col-2">
								<i class="ion-ios-information-circle-outline"></i>
							</div>
							<div class="col-10">
								<p>
									<strong>Specialité</strong>
								</p>
								<p>
									<input type="text" value="Web Developer" class="form-control" name="specialite" placeholder="Votre spécialité">
								</p>
							</div>
						</div>
						<div class="row align-items-center">
							<div class="col-2">
								<i class="ion-ios-navigate-outline"></i>
							</div>
							<div class="col-10">
								<p>
									<strong>Location</strong>
								</p>
								<p>
										<input type="text" value="Agadir , Maroc" class="form-control" name="location" placeholder="Votre location">
								</p>
							</div>
						</div>
						<div class="row align-items-center">
							<div class="col-2">
								<i class="ion-md-calendar"></i>
							</div>
							<div class="col-10">
								<p>
									<strong>Registration date</strong>
								</p>
								<p>15 Octobre 2017</p>
							</div>
						</div>
						<div class="row align-items-center">
							<div class="col-2">
								<i class="ion-ios-cloud-done-outline"></i>
							</div>
							<div class="col-10">
								<p>
									<strong>Projet réalisé</strong>
								</p>
								<p>4 projets</p>
							</div>
						</div>
						<div class="row align-items-center">
							<div class="col-2">
								<i class="ion-ios-star-half-outline"></i>
							</div>
							<div class="col-10">
								<p>
									<strong>Rating</strong>
								</p>
								<span class="rating bg-warning">4.5</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-8">
				<div class="biographie card p-4">
					<h4 class="card-title ">
						Biographie
					</h4>
					<div class="row align-items-center">
						<div class="col-12 bio-skill">
							<div class="bio">
								<i class="ion-md-quote"></i>
								<span>This is my biographie</span>
								<i class="ion-md-quote"></i>
								<span class="badge badge-success">Modifier</span>
							</div>
							<div class="skills mt-2">
								<h6>
									<i class="ion-logo-buffer"></i>
									<strong>SKILLS</strong>
								</h6>
								<div class="list-skills">
									<span class="badge badge-default">HTML5</span>
									<span class="badge badge-default">CSS3</span>
									<span class="badge badge-default">JAVASCRIPT</span>
									<span class="badge badge-default">IOS</span>
									<span class="badge badge-default">MOBILE</span>
									<span class="badge badge-default">C#</span>
									<span class="badge badge-default">HTML5</span>
									<span class="badge badge-default">CSS3</span>
									<span class="badge badge-default">JAVASCRIPT</span>
									<span class="badge badge-default">IOS</span>
									<span class="badge badge-default">MOBILE</span>
									<span class="badge badge-default">C#</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="diploma card">
					<h4 class="card-title ml-4">
						Diplome
					</h4>
					<div class="list-diplom">
						<div class="diploma-desc">
							<div class="dot"></div>
							<i class="ion-ios-briefcase"></i>
							<p class="diploma-title">
								<strong>Ingénierie de systèmes informatiques et logiciels</strong>
							</p>
							<p class="lead">
								2017/2018
							</p>
							<p class="lead">
								EST, Essaouira
							</p>
						</div>
						<div class="diploma-desc">
							<div class="dot"></div>
							<i class="ion-ios-briefcase"></i>
							<p class="diploma-title">
								<strong>Ingénierie de systèmes informatiques et logiciels</strong>
							</p>
							<p class="lead">
								2017/2018
							</p>
							<p class="lead">
								EST, Essaouira
							</p>
						</div>
						<div class="diploma-desc">
							<div class="dot"></div>
							<i class="ion-ios-briefcase"></i>
							<p class="diploma-title">
								<strong>Ingénierie de systèmes informatiques et logiciels</strong>
							</p>
							<p class="lead">
								2017/2018
							</p>
							<p class="lead">
								EST, Essaouira
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js')
	<script src="{{asset('js/app.js')}}"></script>
@endsection