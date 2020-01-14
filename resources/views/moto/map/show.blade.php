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
			<h3>Coordenadas de ubicacion de cliente</h3>
		<div style="height: auto; width: 30%float: right;" class="container ">
		<label for="latitud" class="btn btn-info"><strong>Latitud</strong></label>
		<input disabled type="text" name="latitud" id="latitud" value="{{ $map->latitude }}">
		<br>
		<label for="#" class="btn btn-info"><strong>Longitud</strong></label>
		<input disabled type="text" name="longitud" id="longitud" value="{{ $map->longitude }}">
		<div>
			<a href="{{ route('location.index') }}" class="btn btn-primary">Volver</a>
		</div>
		</div>
	</div>
	

	 <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
	   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
	   crossorigin="">
	   
	</script>
	<script src="{{ asset('js/map1.js') }}">
		
	</script>
	<!-- Bootstrap JS-->
    <script src="{{ asset('vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/js/bootstrap.min.js') }}"></script>
</body>
</html>

