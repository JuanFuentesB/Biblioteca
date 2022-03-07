@extends('layout.plantilla')

@section('estilos')
.mostrar{
	display: list-item;
	opacity: 1;
	background-color: rgba(0,0,0, 0.5) !important;
}
.cerrar{
	text-align: right;
	margin-top: 15px;
}

@endsection



@section('contenido')
	<div class="col-md-12" id='app_librosPrestados'>
		<div class="panel panel-default">
			<div class="panel-body tabs">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#tab1" data-toggle="tab"  >Libros</a></li>
					<li><a href="#tab2" data-toggle="tab" @click="ListLibros()">Prestamos</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane fade in active" id="tab1">
						<table class="table">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Titulo</th>
									<th scope="col">Autor</th>
									<th scope="col">Editorial</th>
									<th scope="col">Año</th>
									<th scope="col">Devolver</th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="libro in mislibros">
									<td v-text="libro.id"></td>
									<td v-text="libro.titulo"></td>
									<td v-text="libro.autor"></td>
									<td v-text="libro.editorial"></td>
									<td v-text="libro.ano"></td>
									<td><button type="button" class="btn btn-info" @click="devolverLibro(libro.id)">Regresar Libro</button></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="tab-pane fade" id="tab2">
						<table class="table">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Titulo</th>
									<th scope="col">Autor</th>
									<th scope="col">Editorial</th>
									<th scope="col">Año</th>
									<th scope="col">Obtener Libro</th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="Plib in Plibros">
									<td v-text="Plib.id"></td>
									<td v-text="Plib.titulo"></td>
									<td v-text="Plib.autor"></td>
									<td v-text="Plib.editorial"></td>
									<td v-text="Plib.ano"></td>
                  <td><button type="button" class="btn btn-info" @click="Pedirlibros(Plib.id)">Pedir Libro</button></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection