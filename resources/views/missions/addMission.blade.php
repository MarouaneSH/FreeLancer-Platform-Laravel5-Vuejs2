@extends('layout.app')
@section('title' , "Liste des missions")

@section('style')
   <link rel="stylesheet" href="{{mix('css/mission.css')}} ">
@endsection


@section('content')
    @include('layout.navbar')
    <div class="container">
        <div class="card text-left mt-5">
          <div class="card-body">
            <h4 class="card-title">Ajouter une mission</h4>
            <form id="fromAddMission" method="POST">
            <div class="md-froms mt-4">
                <div class="md-form">
                    <input type="text" name="nameMission" id="nameMission" class="form-control">
                    <label for="nameMission" class="">Titre de mission</label>
                </div>
                <div class="md-form" name="categorie">
                    <select class="input-field" name="categorie">
                            <option value="" disabled selected>Categorie</option>
                        @foreach ($categories as $categorie)
                            <option value="{{$categorie->categorie_name}}">{{$categorie->categorie_name}}</option>
                        @endforeach>
                    </select>
                </div>
                <div class="md-form mt-4">
                        <textarea type="text" name="description" id="description" class="md-textarea"></textarea>
                        <label for="description">Mission Description</label>
                </div>
                <div class="md-form">
                    <select class=" input-field" name="type">
                            <option value="distance" disabled>Type</option>
                            <option value="distance">Distance</option>
                            <option value="Sur Place">Sur Place</option>
                    </select>
                </div>
                <p>Min budget (DH)</p>
                <div class="md-form">
                     <input type="range" min="0" max="10000" name="minBudget"/>
                </div>
                  <p>Max budget (DH)</p>
                 <div class="md-form">
                     <input type="range" min="0" max="10000" name="maxBudget"/>
                </div>
                <p>Durée Mission (jour)</p>
                 <div class="md-form">
                     <input type="range" min="0" max="200" name="duree"/>
                </div>
                <p>Compétence nécessaire </p>
                 <div class="md-form w-50 ">
                     <input type="text" width="200px" id="" class="w-25 skillInput"/>
                     <span class="addSkill btn-floating btn-large waves-effect waves-light tile white-text">ADD</span>
                    
                </div>
                <p class="skill-list"></p>
                <div class="d-flex justify-content-end">
                    <button class="btn waves-effect waves-light btnAddMission" type="submit" name="action">
                      Ajouter
                    </button>  
                </div>          
            </div>
        </form>
          </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/mdb.js')}}"></script>
    <script src="{{asset('js/sweetalert2.min.js')}}"></script>
    <script>
            $(document).ready(function() {
                $('select').material_select();
              });

              var formMission = document.getElementById('fromAddMission');
              var btnAddMission = document.querySelector('.btnAddMission');
              var $loading = document.querySelector('.loading');
              var btnAddSkill = document.querySelector('.addSkill');
              var skillList = document.querySelector('.skill-list');
              var SkillInput = document.querySelector('.skillInput');
              btnAddSkill.addEventListener('click',(e)=>{
                console.log(e.target);
                skillList.innerHTML += `
                <input type="hidden" width="200px" value="${SkillInput.value}" class="w-25" name="skills[]"/>
                <span class="badge badge-primary">${SkillInput.value}</span>
                `;
                SkillInput.value="";
              });
              btnAddMission.addEventListener('click',function(e){
                  e.preventDefault();
                  var formData  = new FormData(formMission);
                  $loading.style.display = "flex"; 
                  axios.post('/missions/ajouter',{
                      nameMission : formData.get('nameMission'),
                      categorie : formData.get('categorie'),
                      description : formData.get('description'),
                      minBudget : formData.get('minBudget'),
                      maxBudget : formData.get('maxBudget'),
                      duree : formData.get('duree'),
                      type : formData.get('type'),
                      skills:formData.getAll('skills[]'),
                  }).then(function(resultat){
                      if(resultat.data.success){
                          displaySuccess("Success");
                      }
                      else{
                          displatError();
                      }
                  }).catch((error) => {
                      displatError();
                  })
              })
              


              function displaySuccess(message){
                $loading.style.display = "none";
                swal(
                    `${message}`,
                    '',
                    'success'
                  );
               }
            
            
            function displatError(){
                $loading.style.display = "none";
                swal(
                    'Oops...',
                    'Something went wrong!',
                    'error'
                  )
              }
            
    </script>
@endsection