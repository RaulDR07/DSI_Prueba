<!DOCTYPE html>
<html>
<head>
	<title>Bienvenido a La Posada Ecololica La Abuela</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" type="text/css" href="{{URL::to('/asset/css/bootstrap.min.css')}}">
  	<style type="text/css">
  		#site-header{
  			background: #003333;
  		}
  	</style>

</head>
<body>
<div class="collapse navbar-collapse" id="navs">
	<ul class="nav navbar-nav">
		<li><a class="info" href="{{route('book')}}" target =_Blank>Inicio</a></li>
		
	</div>

<div class="container-fluid">
	<div class="row" id="site-header">
		<h1 class="text-center"><img src="{{URL::to('/images/logo3.png')}}"></h1>
	</div>
</div>
<div class="alert alert-warning">
	<p>NOTA: 
Su reserva solo es válida durante 72 horas después del envío. Visite nuestro hotel y traiga una copia impresa de sus datos para validar su reservacion.</p>
</div>

<div class="container">
	<div class="col-lg-4">
		<h3>Información del cliente</h3>
		<ul>
			<li>Apellidos: {{$reservation->customer->lname}}</li>
			<li>Primer nombre: {{$reservation->customer->fname}}</li>
			<li>Segundo Nombre: {{$reservation->customer->mname}}</li>
			<li>Genero: {{$reservation->customer->gender}}</li>
			<li>Fecha de nacimiento: {{$reservation->customer->dob}}</li>
			<li>Dirección: {{$reservation->customer->address}}</li>
			<li>Número telefonico: {{$reservation->customer->contact}}</li>
		</ul>
	</div>
	<div class="col-lg-4">
		<h3>Detalles Reservación</h3>
		<ul>
			<li>Número de cuarto: {{$reservation->rooms}}</li>
			<!--<li>Tipo de cuarto: {{$reservation->room_type->type}}</li>-->
			<li>Check In: {{$reservation->checkin}}</li>
			<li>Check Out: {{$reservation->checkout}}</li>
			<!--<li>Precio: {{$reservation->room_type->price}} </li>-->
		</ul>
	</div>
	<div class="col-lg-4">
		<h3>QR CODE</h3>
		<iframe src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{$reservation->barcode}}" height="160px" width="160px"></iframe>
		<h3><button class="btn btn-success" onclick="print()">Print</button></h3>
		
	</div>
</div>



</body>
<script type="text/javascript" src="{{URL::to('/asset/jquery.js')}}"></script>
<script type="text/javascript" src="{{URL::to('/asset/js/bootstrap.min.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function(){
		function print() {
		    window.print();
		}
	});
</script>
</html>