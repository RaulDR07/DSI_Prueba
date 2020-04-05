@extends('template.staff')

@section('sidebar')
<li><a href="{{route('index')}}"><span class="glyphicon glyphicon-home"></span>Comprobación de código de barras</a></li>
<li><a href="{{route('suite')}}"><span class="glyphicon glyphicon-home"></span>Cabaña 3</a></li>
<li class="active"><a href="{{route('deluxe')}}"><span class="glyphicon glyphicon-home"></span>Cabaña 2</a></li>
<li ><a href="{{route('staff')}}"><span class="glyphicon glyphicon-home"></span>Cabaña 1</a></li>
@endsection

@section('content-title')
<h2>Solicitud de reserva</h2>
@endsection

@section('content')

<div class="col-md-12 well">
	<h3 class="text-center">Cabaña 2</h3>
	<table class="table">
		<thead>
			<tr>
			<th>Check In</th>
				<th>Check Out</th>
				<th>Apellido</th>
				<th>Nombre</th>
				<th>No. Cuarto</th>
				<th>Operaciones</th>
				<th>Estado</th>
				<th>Tiempo</th>
			</tr>
		</thead>
		<tbody>
			@if($reserves->count())
				@foreach($reserves as $reserve)
					@if($reserve->type == 2)
						<tr>
							<td>{{$reserve->checkin}}</td>
							<td>{{$reserve->checkout}}</td>
							<td>{{$reserve->customer->lname}}</td>
							<td>{{$reserve->customer->fname}}</td>
							<td>{{$reserve->rooms}}</td>
							<td>
								<button onclick="onClick1('status_'+{{ $reserve->id }})" class="btn btn-success btn-xs">Pagado</button>
								<button onclick="onClick2('status_'+{{ $reserve->id }})" class="btn btn-warning btn-xs">Disponible</button>
								<!--<a href="#" class="btn btn-danger btn-xs">Notificar</a> -->
							</td>

							<td id="status_{{ $reserve->id }}">
							@if($reserve->status == 1)
									Pendiente
								@else
									Pagado
								@endif
							</td>

							<td>{{$reserve->created_at->diffForHumans()}}</td>
						</tr>
					@endif
				@endforeach
			@endif
		</tbody>
	</table>
</div>

@endsection

<script>
function onClick1(value) {
	console.log(value)
	current = document.getElementById(value)
	current.textContent = 'Pagado'
}
function onClick2(value) {
	console.log(value)
	current = document.getElementById(value)
	current.textContent = 'Disponible'
}
</script> 