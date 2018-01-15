@extends('templates.template')

@section('content')

<h1 class="title-pg">Formulário</h1>

@if( isset($errors) && count($errors) > 0)
	<div class="alert alert-danger">
		@foreach ($errors->all() as $error)
			<p>{{$error}}</p>
		@endforeach
	</div>
@endif

@if ( isset($custo) )
<form class="form" method="post" action="{{route('custos.update', $custo->id)}}">
	{!! method_field('PUT') !!}

@else
<form class="form" method="post" action="{{route('custos.store')}}">

@endif
	
	<!-- <input type="hidden" name="_token" value="{{csrf_token()}}"> -->

	{!! csrf_field() !!}

    <div class="form-group">
		<textarea name="description" placeholder="Descrição" class="form-control">{{$custo->description or old('description')}}</textarea>
	</div>

    <div class="form-group">
		<input type="date" name="date" placeholder="Data" class="form-control" value="{{$custo->date or old('date')}}">
	</div>

	<div class="form-group">
		<input type="text" name="value" placeholder="Valor" class="form-control" value="{{$custo->value or old('value')}}">
	</div>

	<button class="btn btn-primary">Enviar</button>
@endsection