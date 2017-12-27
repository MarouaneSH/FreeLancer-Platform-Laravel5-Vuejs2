@extends('layout.app') 
@section('title','Modify Freelancer Profile') 

@section('style')
	<link rel="stylesheet" href="{{mix('css/profile.css')}} ">
	<link rel="stylesheet" href="{{mix('css/modify-profile.css')}} "> 
@endsection

 @section('content') 
 	@include('layout.navbar')
		<div class="container">
			<div class="row justify-content-end mt-5 mb-3 pr-3 btn-route">
				<button id="btn-modify" class="bttn-fill bttn-md bttn-primary bttn-no-outline">
					<a href="{{url('profile')}}">Voir votre profile</a>
				</button>
			</div>
			<div class="profil-wrapper row ">
				<div class="col-4">
					{{-- form modiy user information --}}
					<form action="{{route('modifyProfile')}}" id="formUserinfo" method="POST">
						{{ csrf_field() }}
						<div class="user-info card p-2">
							<h4 class="card-title ml-0">
								Information
							</h4>
							<div class="top-user-info">
								<div class="img-user mx-auto" style="background-image:url('{{asset('img/unknown.png')}}')"></div>
								<h4>
									<p for="">Nom : </p>
									<input type="text" value="{{Auth::user()->nom}}" placeholder="Votre nom" class="form-control" name="nom">
									<p for="">Prenom : </p>
									<input type="text" value="{{Auth::user()->prenom}}" placeholder="Votre prenom" class="form-control" name="prenom">
								</h4>
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
											<input type="text" value="{{$user->specialite}}" placeholder="Votre specialité" class="form-control" name="specialite" placeholder="Votre spécialité">
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
											<input type="text" value="{{$user->location}}" placeholder="Votre location" class="form-control" name="location" placeholder="Votre location">
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
										<span class="rating bg-warning">{{ number_format($userRating,1 )}}</span>
									</div>
								</div>
								<div class="row justify-content-end">
									<button value="userInfo" class="btnModify bttn-fill bttn-md bttn-primary bttn-no-outline">
										Enregistrer
									</button>
								</div>
					</form>
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
									<span id="biographie">{{$user->biographie}}</span>
									<i class="ion-md-quote"></i>
									<span value="biographie" class="badge badge-light-modify" data-toggle="modal" data-target="#editbiographie">Modifier</span>
								</div>
								<div class="skills mt-2">
									<h6>
										<i class="ion-logo-buffer"></i>
										<strong>SKILLS</strong>
										<span value="skills" class="badge badge-light-modify" data-toggle="modal" data-target="#addModalSKILLS">AJOUTER</span>
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
						<h6 class="card-title ml-4">
							Diplome
							<span value="diplome" class="badge badge-light-modify" data-toggle="modal" data-target="#addModalDiploma">AJOUTER</span>
						</h6>
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


		<!-- Modal Edit biographie-->
		<div class="modal fade" id="editbiographie" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="modelTitleId">Modifier votre biographie</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form id="modifyBiographie">
						<div class="modal-body">
							<div class="container-fluid">
								<textarea name="biographie" cols="30" rows="5" class="form-control">{{$user->biographie}}</textarea>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
							<button type="button" value="biographie" class="btnModify btn btn-primary">Enregistrer</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- Modal ADD SKILLS-->
		<div class="modal fade" id="addModalSKILLS" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="modelTitleId">Ajouter une competence</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form id="addSkillsForm">
						<div class="modal-body">
							<div class="container-fluid">
								<label for="">Name</label>
								<input type="text" class="form-control" name="skillName" placeholder="Skills name">
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
							<button type="button" value="skills" class="btnModify btn btn-primary">Enregistrer</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- Modal ADD SKILLS-->
		<div class="modal fade" id="addModalDiploma" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="modelTitleId">ajouter un diplôme</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form id="addDiplomForm">
						<div class="modal-body">
							<div class="container-fluid">
								<label for="">Nom du diplome</label>
								<input type="text" class="form-control" name="diplomName" placeholder="Nom diplome">
								<label for="">Date diplome</label>
								<input type="text" class="form-control" name="annee" placeholder="Année diplome">
								<label for="">Etablissement</label>
								<input type="text" class="form-control" name="etablissement" placeholder="etablissement">
							
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
							<button type="button" value="diplome" class="btnModify btn btn-primary">Enregistrer</button>
						</div>
					</form>
				</div>
			</div>
		</div>


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

@endsection

@section('js')
	<script src="{{asset('js/app.js')}}"></script>
	<script src="{{asset('js/sweetalert2.min.js')}}"></script>
	<script src="{{asset('js/modify-profile.js')}}"></script>
@endsection