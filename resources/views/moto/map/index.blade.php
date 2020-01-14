<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
	   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
	   crossorigin=""/>
	   <link href="{{ asset('vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

</head>
<body>
			
			
	<div class="container">
		<div id="myMap" style="height: 600px; " class="col-md-8 float-left"></div>
		<div style="height: auto; width: 30%float: right;" class="col">
			{!! Form::open(['route' => 'travel.map','method'=>'POST']) !!}	
				<legend>Coordenadas de ubicación</legend>
				<div class="form-group row {{ $errors->has('latitud') ? 'has-error' : ''}}">
					{!! Form::label('latitud', 'Latitud:', ['class' => 'col-md-4 col-form-label text-md-right']) !!}

					<div class="col">
						{!! Form::text('latitud', null, ['class' => 'form-control', 'autofocus' => 'autofocus','style' =>
						'text-transform:uppercase;',
						'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!} 
						{!! $errors->first('latitud', '<p class="alert-danger">:message</p>') !!}
					</div>
				</div>
				<div class="form-group row {{ $errors->has('longitud') ? 'has-error' : ''}}">
					{!! Form::label('longitud', 'Longitud:', ['class' => 'col-md-4 col-form-label text-md-right']) !!}

					<div class="col">
						{!! Form::text('longitud', null, ['class' => 'form-control', 'autofocus' => 'autofocus','style' =>
						'text-transform:uppercase;',
						'onkeyup' => 'javascript:this.value=this.value.toUpperCase();']) !!} 
						{!! $errors->first('longitud', '<p class="alert-danger">:message</p>') !!}
					</div>
				</div>	
				<div class="form-group row mb-0">
					<div class="col">
						<a href="{!! route('location.index') !!}" class="btn btn-secondary">
							 Cancelar
						</a>
					</div>
					<div class="col offset-md-2">
						<button type="submit" class="btn btn-primary" onclick="return confirm('¿Esta seguro de guardar los cambios que hizo?')">
							 {{ __('Enviar') }}
						</button>
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
	

	 <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
	   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
	   crossorigin="">
	   
	</script>
	<script src="{{ asset('js/map.js') }}">
		
	</script>
	<!-- Bootstrap JS-->
    <script src="{{ asset('vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/js/bootstrap.min.js') }}"></script>
</body>
</html>

