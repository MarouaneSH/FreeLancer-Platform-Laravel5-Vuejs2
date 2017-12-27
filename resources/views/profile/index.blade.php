@extends('layout.app')

@section('title','Freelancer Profile')
@section('style')
	<link rel="stylesheet" href="{{mix('css/profile.css')}} ">
@endsection


@section('content')
	@include('layout.navbar')

	<div class="container">
		<div class="row justify-content-end mt-5 mb-3 pr-3 btn-route">
			<button id="btn-addMision" class="bttn-fill bttn-md bttn-primary bttn-no-outline mr-1">
					<a href="{{route('modifyProfile')}}">AJOUTER UNE  MISSION</a>	
			</button>
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
						<div class="img-user mx-auto" style="background-image:url('{{asset('img/unknown.png')}}')"></div>
						<h4>{{Auth::user()->nom. ' ' .Auth::user()->prenom }} </h4>
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
									@isset ($user->specialite)
											{{$user->specialite}}
									@else
									     Spécialité inconnu	                
									@endisset
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
									@isset ($user->ville)
											{{$user->ville}} , {{$user->pays}}
									@else
									     Location inconnu	                
									@endisset
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
								<p>{{$projectRealiser}} projets</p>
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
								<span class="rating bg-warning">{{ number_format($userRating,1 )}} </span>
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
						<div class="col-4 text-center">
							<button class="bttn-fill bttn-md bttn-primary bttn-no-outline">
								<i class="ion-md-mail"></i>
								<span>ENVOYER MESSAGE</span>
							</button>
						</div>
						<div class="col-8 bio-skill">
							<div class="bio">
								<i class="ion-md-quote"></i>
								<span>
									@isset ($user->biographie)
										{{$user->biographie}}
									@else
									 	Modifiez votre biographie	                
									@endisset
								</span>
								<i class="ion-md-quote"></i>
							</div>
							<div class="skills mt-2">
								<h6>
									<i class="ion-logo-buffer"></i>
									<strong>SKILLS</strong>
								</h6>
								<div class="list-skills">
									@foreach ($userSkill as $skill)
										<span class="badge badge-default"> {{$skill->skill_name}} </span>
									@endforeach
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
						@foreach ($userDiploma as $diplom)
							<div class="diploma-desc">
									<div class="dot"></div>
									<i class="ion-ios-briefcase"></i>
									<p class="diploma-title">
										<strong>{{$diplom->diploma_name}} </strong>
									</p>
									<p class="lead">
											{{$diplom->date_diploma}}
									</p>
									<p class="lead">
										{{$diplom->etablissement}}
									</p>
								</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js')
	<script src="{{asset('js/app.js')}}"></script>
@endsection