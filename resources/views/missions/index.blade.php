@extends('layout.app')
@section('title' , "Liste des missions")

@section('style')
   <link rel="stylesheet" href="{{mix('css/mission.css')}} ">
@endsection


@section('content')
    @include('layout.navbar')
    <div class="container">
        <div class="card text-left mt-5">
          <img class="card-img-top" src="holder.js/100px180/" alt="">
          <div class="card-body">
            <h4 class="card-title">Ajouter une mission</h4>
            <div class="row">
                <form action="">
                    <div class="form-group">
                       <div class="col-8">
                        <div class="md-form form-sm">
                            <input type="text" id="form1" class="form-control">
                            <label for="form1" class="">Small input</label>
                        </div>
                       </div>
                      <input type="text|password|email|number|submit|date|datetime|datetime-local|month|color|range|search|tel|time|url|week" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                      <small id="helpId" class="text-muted">Help text</small>
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>
@endsection

@section('js')
	<script src="{{asset('js/app.js')}}"></script>
@endsection