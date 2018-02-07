@extends('layouts.app')
@section('title')
<title>Welcome</title>
@endsection
@section('content')
		<div class="principal">
			@foreach ($contents as $content)
			<div class="card card-register col-md-4 secundario">
				<div class="card-header col-md-12">
				<h4 class="titulo">{{ $content['title'] }}</h4>
				</div>
				<div class="card-body col-md-12">
					<div class="col-md-12 imagen">
						<img class="centrar" src="{{ $content['image'] }}" alt="Imagen">
					</div>
					<div class="col-md-12">
						<p>{{ $content['descripcion'] }}</p>
					</div>
					<div class="col-md-12">
						<div class="form-row">
							<div class="col-md-6"> <img src="{{ $content['image_marca'] }}">
							</div>
							<div class="col-md-6"><h1>{{ $content['precio_actual'] }}</h1>
							</div>
						</div>
					</div><br>
					<div class="text-center col-md-12">
						@if (Auth::check())
							<form method="POST" action="add">
								{{ csrf_field() }}
								<input type="hidden" id="id_user" name="id_user" value="{{ Auth()->user()->id  }}">
								<input type="hidden" id="product" name="product" value="{{ $content['title'] }}">
								<input type="hidden" id="precio" name="precio" value="{{ $content['precio_actual'] }}">
								<button class="btn btn-primary btn-block" onclick="alerta2()">Add WishList</button>	
							</form>
						@endif
					</div>
				</div>
			</div>
			@endforeach
		</div>
@endsection
