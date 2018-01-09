@extends('layout.app')
@section('title' , "Liste des missions")

@section('style')
   <link rel="stylesheet" href="{{mix('css/mission.css')}} ">
@endsection


@section('content')
    @include('layout.navbar')
    
    <div class="container">
        <div class="mission-wrapper mt-5">
            <div class="row">
                <div class="mission-critere col-4">
                    <div class="card-panel teal">
                            <h5>
                                <i class="ion-md-analytics"></i>
                                Recherche Avancée
                            </h5>
                            <form id="formSearch" action="{{route('searchMission')}}" >
                                <select name="categorie" >
                                        <option disabled selected>Categories</option>
                                    @foreach ($categories as $categorie)
                                        <option value="{{$categorie->categorie_name}} ">{{$categorie->categorie_name}}</option>
                                    @endforeach
                                </select>
                                <div class="mission-type row">
                                    <div class="col-6 text-center">
                                        <i class="ion-ios-cloud"></i>
                                        <h6>Distance</h6>
                                        <div class="switch">
                                            <label>
                                            <input type="checkbox" name="distance" checked>
                                            <span class="lever white"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6 text-center">
                                        <i class="ion-ios-navigate"></i>
                                        <h6>Sur place</h6>
                                        <div class="switch">
                                            <label>
                                            <input type="checkbox"  name="place" checked>
                                            <span class="lever white"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="range">
                                    <h6>Min Budget (DH)</h6>
                                        <p class="range-field">
                                            <input type="range" value="0" id="test5" name="minbudget" min="0" max="10000" style="border:none"/>
                                        </p>
                                </div>
                                <div class="range">
                                        <h6>Max Budget (DH)</h6>
                                        <p class="range-field">
                                            <input type="range" value="10000" name="maxbudget" id="test5" min="0" max="10000" style="border:none"/>
                                        </p>
                                </div>
                                <div class="d-flex justify-content-end">
                                        <button type="submit" class="waves-effect waves-light btn">Chercher</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="mission-critere col-8">
                            <div class="mission-list">
                                @foreach ($missions as $mission)
                                    <div class="card single-mission white ">
                                        <div class="card-content black-text">
                                            <span class="card-title ">
                                                {{$mission->titre_mission}} 
                                                <span class="badge badge-primary">
                                                    {{DB::table('categories')->where('categorie_id' , '=' , $mission->categorie_id)->get()[0]->categorie_name}}
                                                </span>
                                            </span>
                                            <p>{{$mission->description_mission}}</p>
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
                                                
                                                <div>
                                                    <i class="ion-md-cash"></i>
                                                    {{$mission->min_budget}} DH - {{$mission->max_budget}} DH
                                                </div>
                                                <div class="voir-mission ml-auto">
                                                        <a href="{{route('singleMission',$mission->mission_id)}}" class="teal-text">
                                                            <strong>Voir Mission</strong>
                                                        </a>
                                                </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>

@endsection

@section('js')
        <script src="{{asset('js/app.js')}}"></script>
        <script src="{{asset('js/mdb.js')}}"></script>
        <script src="{{asset('js/sweetalert2.min.js')}}"></script>
        <script src="{{asset('js/mission.js')}}"></script>
        <script>
                $(document).ready(function() {
                    $('select').material_select();
                });
        </script>
@endsection