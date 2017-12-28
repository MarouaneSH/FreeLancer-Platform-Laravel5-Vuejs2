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
					<a href="{{url('profile')}}">
						<button type="button" id="btn-modify" class="btn btn-default">
								Voir votre profile
						</button>
			    	</a>
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
											<input type="text" value="{{Auth::user()->specialite}}" placeholder="Votre specialité" class="form-control" name="specialite" placeholder="Votre spécialité">
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
											<input type="text" value="{{Auth::user()->location}}" placeholder="Votre location" class="form-control" name="location" placeholder="Votre location">
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
									<button value="userInfo" class="btnModify btn btn-default">
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
									<span id="biographie">{{Auth::user()->biographie}}</span>
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
									<div class="form-group basic-textarea rounded-corners purple-border">
											<label for="exampleFormControlTextarea4">Modifier votre biographie</label>
											<textarea class="form-control" name="biographie" id="exampleFormControlTextarea4" rows="6">{{Auth::user()->biographie}}</textarea>
										</div>
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
						<h4 class="modal-title" id="modelTitleId">Ajouter un diplôme</h4>
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

@endsection

@section('js')
	<script src="{{asset('js/app.js')}}"></script>
	<script src="{{asset('js/sweetalert2.min.js')}}"></script>
	<script src="{{asset('js/modify-profile.js')}}"></script>
@endsection