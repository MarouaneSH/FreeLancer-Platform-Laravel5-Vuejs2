@extends('layout.app')

@section('title','Freelancer Profile')
@section('style')
	<link rel="stylesheet" href="{{mix('css/user.css')}} ">
@endsection


@section('content')
    @include('layout.navbar')
    <div class="container mt-5">
    @foreach($users as $user)
      <div class="card white darken-1 black-text">
        <div class="card-content black-text">
             <div class="row align-items-center">
                 <div class="col-3 text-right">
                        
                        <div class="user-img" style="background-image:url('{{url($user->image)}}')"></div>
                        
                 </div>
                 <div class="col-9">
                        <h4>{{$user->nom}} {{$user->prenom}} </h4>
                        <span class=" blue-grey-text text-lighten-1">Biographie</span>
                        <p class="lead">
                                {{$user->biographie}}
                        </p>
                        <span class=" blue-grey-text text-lighten-1">Skills</span>
                        <p class="lead">
                                @php    
                                   $skillIds = DB::table("user_skills")->where('user_id' , '=', $user->id)->get();
                                @endphp
                                @foreach ($skillIds  as $skillid)
                                     @php
                                     $skilName = DB::table("skills")->where('skill_id','=',$skillid->skill_id)->first();
                                     @endphp 
                                     <span class="badge badge-primary">{{ $skilName->skill_name }}</span>
                                @endforeach
                        </p>
                 </div>
             </div>
            </div>
            <div class="card-action text-right">
                <a href="#" class="teal-text">Visit profile</a>
            </div>
        </div>
      @endforeach
    </div>
@endsection

 @section('js')
        <script src="{{asset('js/app.js')}}"></script>
@endsection