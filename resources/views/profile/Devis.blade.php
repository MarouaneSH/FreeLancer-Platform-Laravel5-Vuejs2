@extends('layout.app')

@section('title','Freelancer Profile')
@section('style')
	<link rel="stylesheet" href="{{mix('css/profile.css')}} ">
@endsection


@section('content')
    @include('layout.navbar')
    
    <div class="container">
        <div class="card white darken-1 mt-5">
            <div class="card-content white-text">
              <span class="card-title">Liste demandes de devis</span>
              <p>
                    <table class="highlight black-text">
                            <thead>
                              <tr>
                                  <th>Mission</th>
                                  <th>Nom & Prenom</th>
                                  <th>Email</th>
                                  <th>Télephone</th>
                                  <th>Prix Demandé</th>
                                  <th>Commentaire</th>
                              </tr>
                            </thead>
                    
                            <tbody>
                                @foreach ($listeDevis as $devis)
                                    <tr>
                                        @php
                                            $mission=DB::table('missions')->where('mission_id', '=' , $devis->mission_id)->first();
                                        @endphp
                                    <td>{{$mission->titre_mission}} </td>
                                        @php
                                            $user=DB::table('users')->where('id' ,'=' ,  $devis->user_id)->first();   
                                        @endphp
                                        <td>{{$user->nom}} {{$user->prenom}}</td>
                                        <td>{{$user->email}} </td>
                                        <td>{{$devis->tel}} </td>
                                        <td>{{$devis->prix_demander}} </td>
                                        <td>{{$devis->commentaires}} </td>
                                        
                                    </tr>
                               @endforeach
                            </tbody>
                          </table>
              </p>
            </div>
          </div>
    </div>
    @endsection

    @section('js')
        <script src="{{asset('js/app.js')}}"></script>
    @endsection