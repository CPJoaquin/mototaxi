@extends('layouts.app')
@section('content')
<div class="row container">
  <!--div id="myMap" class="col-md-8" style="height: 600px;"></div-->  
  <div id="map"></div>
    
  </div>
  <div class="col-md-4">
    <div class="text-center">
      <div class="row">
          <a href="{!! url('/home') !!}" class="btn btn-primary btn-sm ml-auto">
            <i class="fas fa-arrow-alt-circle-left"></i> 
            Atrás
          </a>
      </div>
      <h1>Solicitar transporte</h1>
    </div>
  </div>
</div>
@endsection