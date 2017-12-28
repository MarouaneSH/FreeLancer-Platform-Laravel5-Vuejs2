@extends('layout.app')
@section('title' , "Mission $mission->titre_mission ")

@section('style')
   <link rel="stylesheet" href="{{mix('css/mission.css')}} ">
@endsection


@section('content')
    @include('layout.navbar')
    
    <div class="container">
        <div class="row mt-5">
            <div class="col-8">
                <div class="card white ">
                    <div class="card-content black-text">
                        <span class="card-title">
                            {{$mission->titre_mission}} 
                            <span class="badge badge-primary">
                                    {{DB::table('categories')->where('categorie_id' , '=' , $mission->categorie_id)->get()[0]->categorie_name}}
                                </span>
                        </span>
                        
                        <p>
                            {{$mission->description_mission}} 
                        </p>
                        <h5 class="mt-5">Skills</h5>
                        @php
                          $missionSkills = DB::table('mission_skills')->where('mission_id' , '=' , $mission->mission_id)->get();
                        @endphp
                        @foreach ($missionSkills as $skill)
                            <span class="badge teal ">
                                @php
                                $skilName = DB::table('skills')->where('skill_id' , '=' , $skill->skill_id)->get();
                                @endphp
                                @foreach ($skilName  as $name)
                                    {{$name->skill_name}}
                                @endforeach
                            </span>
                         @endforeach
                    </div>
                    <div class="card-action  mission-info d-flex black-text align-items-center">
                            <div>
                                <i class="ion-ios-calendar"></i>
                                {{$mission->date_publication}} 
                            </div>
                            @if($mission->type_mission == "distance")
                                <div>
                                    <i class="ion-ios-cloud "></i>
                                    Distance
                                </div>
                            @else
                                <div>
                                        <i class="ion-ios-navigate"></i>
                                        Sur place
                                    </div>
                            @endif
                            <div class="ml-auto">
                                    @if(Auth::check())
                                    <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Demander un devis</a>
                                    @else
                                    <a href="{{url('login')}}">
                                    <button type="button" class="btn btn-amber">Login</button>
                                    </a>
                                    @endif
                                </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                    <div class="card teal">
                            <div class="card-content white-text text-center">
                              <span class="card-title ">Budget</span>
                              <p>
                                  <h5>
                                      {{$mission->min_budget}} DH
                                      <span class="badge yellow accent-4">min</span>
                                  </h5>
                                  <h5>
                                        {{$mission->max_budget}} DH
                                        <span class="badge yellow accent-4">Max</span>
                                    </h5>
                              </p>
                            </div>

                            </div>
                    </div>
            </div>
        </div>
    </div>
     <!-- Modal Trigger -->
        
        <!-- Modal Structure -->
        <div id="modal1" class="modal">
            <div class="modal-content">
            <h4>Demander un devis</h4>
            <form action="" id="addQuote">
            <p>
                <div class="input-field ">
                   <input id="last_name" type="number" name="prix" class="validate">
                   <label for="last_name">Prix demandé</label>
                </div>
                <div class="input-field ">
                   <input id="last_name" type="number" name="telephone" class="validate">
                   <label for="last_name">Votre numerau de telephone</label>
                </div>
                <div class="input-field">
                        <textarea id="textarea1"  name="message" class="materialize-textarea"></textarea>
                        <label for="textarea1">Message</label>
                </div>
               
            </p>
            <button class="btn-addQuote  waves-effect waves-light btn  light-blue darken-2 mt-2">Demander un devis</button>
        </form>
            </div>
     </div>
        
    @endsection

@section('js')
        <script src="{{asset('js/app.js')}}"></script>
        <script src="{{asset('js/sweetalert2.min.js')}}"></script>

         @if(Auth::check())
            <script>
                var userId = JSON.parse("{{ json_encode(Auth::user()->id) }}");
            </script>
         @endif
        <script>
                $(document).ready(function() {
                    $('.modal').modal();
                });

                
                var missionID = JSON.parse("{{ $mission->mission_id }}");
                var $loading = document.querySelector('.loading');
                var formDevis = document.getElementById('addQuote');
                var btn = document.getElementsByClassName('btn-addQuote')[0];
                btn.onclick = (e)=>{
                    e.preventDefault();
                    var formData  = new FormData(formDevis);
                    $loading.style.display = "flex"; 
                    axios.post('/missions/demandeDevis',{
                        prix : formData.get('prix'),
                        message : formData.get('message'),
                        tel:formData.get('telephone'),
                        missionId :missionID,
                        userId :userId,

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
                }
                
  
  
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