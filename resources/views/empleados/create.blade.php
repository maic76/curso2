<form method="POST" action="/empleados/store">
	@csrf
	<label>Matricula</label>
	<input type="text" name="matricula">
	<label>Paterno</label>
	<input type="text" name="paterno">
	<label>Materno</label>
	<input type="text" name="materno">
	<label>Nombre</label>
	<input type="text" name="nombre">
	<label>Fecha de Nacimiento</label>
	<input type="text" name="fecha_nacimiento">
	<input type="submit" name="Guardar">
</form>