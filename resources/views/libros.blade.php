@extends('layout.plantilla')

@section('estilos')
.mostrar{
	display: list-item;
	opacity: 1;
	background-color: rgba(0,0,0, 0.5) !important;
}
@endsection



@section('contenido')
	<div class="col-md-12" id='app_libros'>
		<div class="panel panel-default">
			<div class="panel-body tabs">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#tab1" data-toggle="tab"  >Libros</a></li>
					<li><a href="#tab2" data-toggle="tab" @click="librosPrestados()">Prestamos</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane fade in active" id="tab1">
						<!-- Trigger the modal with a button -->
						<button type="button" class="btn btn-success" data-toggle="modal" @click="modificar=false; abrirModal()">Agregar</button>

						<!-- Modal -->
						<div class="modal" v-bind:class="{mostrar: modal}">
							<div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button @click="cerrarModal()" type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title" v-text="tituloModal"></h4>
									</div>
									<div class="modal-body">
										<form id="add_form">
											<input class="form-control" v-model="id" type="hidden">
											<label for="titulo" class="form-label">Titulo</label>
											<input class="form-control" v-model="titulo" type="text" placeholder="Titulo">

											<label for="autor" class="form-label">Autor</label>
											<input class="form-control" v-model="autor" type="text" placeholder="Autor">

											<label for="editorial" class="form-label">Editorial</label>
											<input class="form-control" v-model="editorial" type="text" placeholder="Editorial">

											<label for="ano" class="form-label">Año</label>
											<input class="form-control" v-model="ano" type="text" placeholder="Año">
										</form>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-success" @click="addLibro()">Guardar</button>
										<button type="button" class="btn btn-danger" @click="cerrarModal()">Close</button>
									</div>
								</div>
							</div>
						</div>

						<table class="table">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Titulo</th>
									<th scope="col">Autor</th>
									<th scope="col">Editorial</th>
									<th scope="col">Año</th>
									<th colspan="2">Acciones</th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="libro in libros">
									<td v-text="libro.id"></td>
									<td v-text="libro.titulo"></td>
									<td v-text="libro.autor"></td>
									<td v-text="libro.editorial"></td>
									<td v-text="libro.ano"></td>
									<td><button type="button" class="btn btn-info" @click="modificar=true; abrirModal(libro)">Editar</button></td>
									<td><button type="button" class="btn btn-danger" @click="eliminarLibro(libro.id)">Elimminar</button></td>
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
									<th scope="col">Usuario</th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="librosP in librosPres">
									<td v-text="librosP.id"></td>
									<td v-text="librosP.titulo"></td>
									<td v-text="librosP.autor"></td>
									<td v-text="librosP.editorial"></td>
									<td v-text="librosP.ano"></td>
									<td v-text="librosP.nombre"></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection