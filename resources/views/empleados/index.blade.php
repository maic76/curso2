<h1>Empleados</h1>
@extends('admin.template.main')
<table>
	<thead>
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($empleados as $empleado)
		<tr>
			<td>{!! $empleado->matricula !!}</td>
			<td>{!! $empleado->paterno !!}
			{!! $empleado->materno !!}</td>
		
		<td>
			<a href="/empleados/{!! $empleado->id !!}/edit">Editar</a>
			{!! Form::model(
                $empleado,
                 ['route' => ['empleados.destroy', $empleado->id],
                 'method' => 'DELETE'
                 ]
         )
 !!}
 {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
			{!! Form::close() !!}
	</td>
	</tr>
		@endforeach
	</tbody>
</table>

{{!! $empleados->links(); !!}}