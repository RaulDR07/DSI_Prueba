@extends('template.staff')

@section('sidebar')
<li class="active"><a href="{{route('index')}}"><span class="glyphicon glyphicon-home"></span>Comprobación de código de barras</a></li>
<li><a href="{{route('suite')}}"><span class="glyphicon glyphicon-home"></span>Cabaña 3</a></li>
<li><a href="{{route('staff')}}"><span class="glyphicon glyphicon-home"></span>Cabaña 2</a></li>
<li ><a href="{{route('deluxe')}}"><span class="glyphicon glyphicon-home"></span>Cabaña 1</a></li>


@endsection
@section('content-title')
<h2>Solicitud de reservas</h2>
@endsection
@section('content')
<div class="col-md-12 well">
	<h1 class="text-center">Escáner Código QR</h1>
	<div class="col-md-4 col-md-offset-4">
		<form>
			<div class="form-group">
				<input type="password" name="barcode" class="form-control" autofocus="">
			</div>
			<button class="btn btn-success btn-block">Verificar</button>
		</form>
	</div>
</div>


@endsection