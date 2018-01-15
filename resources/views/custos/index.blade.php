@extends ('templates.template')

@section('content')

<h1 class="title-pg">Listagem de Custos </h1>

<table class="table table-striped">

<a href="{{route('custos.create')}}" class="btn btn-primary btn-add"><span class="glyphicon glyphicon-plus"></span> Cadastrar</a><br/> 

    
	<tr>
        <th>ID</th>
		<th>Descrição</th>
		<th>Data</th>
        <th>Valores</th>
		<th>Ações</th>
	</tr>
	@foreach($custos as $custo)
	<tr>
        <td>{{$custo->id}}</td>
		<td>{{$custo->description}}</td>
		<td>{{$custo->date}}</td>
        <td>{{number_format($custo->value, 2, ',', '.')}}</td>
		<td>
			<a href="{{ route('custos.edit', $custo->id) }}" class"actions edit">
				<span class="glyphicon glyphicon-pencil icons"></span>
			</a>

			<a href="#">
				<span class="glyphicon glyphicon-trash icons"></span>

			</a>
		</td>
	</tr>
	@endforeach
</table>

@endsection