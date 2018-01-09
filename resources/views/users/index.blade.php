@extends('layout.app')

@section('title','Freelancer Profile')
@section('style')
    <link rel="stylesheet" href="{{mix('css/user.css')}} ">
    <link rel="stylesheet" href="{{asset('css/rating.min.css')}} ">
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
            <div class="card-action text-right d-flex justify-content-end">              
                <div class="my-rating mr-3" data-userId="{{$user->id}}" ></div>
                <a href="{{url('profile/'.$user->id)}} " class="teal-text">Visit profile</a>
            </div>
        </div>
      @endforeach
    </div>
@endsection

 @section('js')
        <script src="{{asset('js/app.js')}}"></script>
        <script src="{{asset('js/rating.min.js')}} "></script>
        <script src="{{asset('js/sweetalert2.min.js')}}"></script>
        <script>
            var $loading = document.querySelector('.loading');
            $(".my-rating").starRating({
                starSize: 25,
                callback: function(currentRating, $el){
                    $userId = $el.data('userid');
                    $rating = currentRating;
                    $loading.style.display = "flex";
                    axios.post('users/addRating',{
                        user : $userId ,
                        rating  :$rating ,
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
            });


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