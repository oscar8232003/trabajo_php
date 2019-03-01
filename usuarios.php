<!DOCTYPE html>
<html lang="es">
<?php require_once("views/header.php");
include("Controladores/Funciones.php");?>
	<body>

	<?php
	session_start();
	if(!isset($_SESSION['usuario']) || !$_SESSION['tipo']=='administrador' ){
		header('location:index.php?error=2');
	}


	if(isset($_GET['delete'])){
		$id_borrar = $_GET['delete'];
		$borrado = funciones::borrar_persona($id_borrar);
	}

	if(isset($_POST['guardar'])){
		$usuario = $_POST['usuario'];
		$password = $_POST['password'];
		$tipo = $_POST['tipo'];
		$id = $_POST['id_modificar'];
		$verificar=funciones::login($usuario);
		if(!$verificar){
			$resultado = funciones::modificar_persona($id,$usuario,$password,$tipo);
		}else{
			header('location:usuarios.php?error=4');
		}
		
	}

	$listado = funciones::traer_personas();
	?>
	
	<!---->
	<div class="container-fluid p-0">
		<!--EMPIEZA HEADER!-->
		<!--NAVBAR, TOP, CAROUSEL Y MODAL-->
		<?php require_once("views/nav.php");?>
		
		<!--TITULO-->
		<main class="container">
			
			<!--TITULO-->
			<div class="row mb-5 mt-2">
				<div class="col-12">
					<h1 class="text-center mt-5">Seccion de edicion de Usuarios</h1>
					<h5 class="text-center text-muted"><em>En esta seccion podra editar los usuarios y contraseñas, como tambien eliminarlos.</em></h5>
					<br>
					<hr>
				</div>
			</div>
			<!--FIN TITULO-->
			
			<?php if(isset($_GET['error']) && $_GET['error'] == '4') {?>
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  <strong>Error, ya existe el usuario, por favor escoja otro usuario</strong>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>
			<?php } ?>
			<!--FORMULARIO PARA GUARDAR DATOS-->
			<?php if(isset($_GET['update'])){ 
				$id_update = $_GET['update'];
				$variable_update = funciones::traer_persona($id_update);
			?>
			<form action="usuarios.php" method="post" class="row justify-content-center" onsubmit="return validar_usuarios()">
				<div class="col-6">
				  <div class="form-group">
		            <label for="usuario" class="col-form-label"><strong>Usuario</strong></label>
		            <div class="input-group mb-2">
				        <div class="input-group-prepend">
				          <div class="input-group-text"><span data-icon="b"></span></div>
				        </div>
				        <input type="text" class="form-control" id="usuario2" name="usuario" placeholder="Usuario" value="<?php echo $variable_update['usuario']?>">
				        <div class="invalid-feedback">
					    	<p id="usuario2-invalid" class="m-0"></p>
					    </div>
					    <div class="valid-feedback">
					    	<p id="usuario2-valid" class="m-0">Correcto</p>
					    </div>
				     </div>
		          </div>
		          <div class="form-group">
		            <label for="password" class="col-form-label"><strong>Password</strong></label>
		            <div class="input-group mb-2">
				        <div class="input-group-prepend">
				          <div class="input-group-text"><span data-icon="d"></span></div>
				        </div>
				        <input type="text" class="form-control" id="password2" name="password" placeholder="Password" value="<?php echo $variable_update['clave']?>">
				        <div class="invalid-feedback">
					    	<p id="password2-invalid" class="m-0"></p>
					    </div>
					    <div class="valid-feedback">
					    	<p id="password2-valid" class="m-0">Correcto</p>
					    </div>
				     </div>
		          </div>

		          <div class="form-group">
		            <label for="tipo_usuario" class="col-form-label"><strong>Tipo Usuario</strong></label>
		            <div class="input-group mb-2">
				        <div class="input-group-prepend">
				          <div class="input-group-text"><span data-icon="i"></span></div>
				        </div>
				        <select class="form-control" id="tipo" name="tipo">
				        	<?php if($variable_update['tipo'] == 'usuario'){ ?>
							<option value="usuario" selected>Usuario</option>
							<option value="administrador">Administrador</option>
							<?php }  else {?>
							<option value="usuario" >Usuario</option>
							<option value="administrador" selected>Administrador</option>
							<?php } ?>
					    </select>
				     </div>
		          </div>
					
					<input type="hidden" value="<?php echo $id_update?>" name="id_modificar">

				  <div class="form-group text-center">
				  	<button type="submit" class="btn btn-success" name="guardar">Guardar</button>
				  </div>
			  </div>
			</form>
			<?php } ?>

			<!--FIN FORMULARIO PARA GUARDAR DATOS-->

			<!--TABLA CON DATOS-->
			<div class="row">

				<div class="col-12">
					<table class="table table-hover">
					  <thead>
					    <tr>
					      <th scope="col">Usuario</th>
					      <th scope="col">Clave</th>
					      <th scope="col">Tipo Usuario</th>
					      <th scope="col">Acciones</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php foreach ($listado as $value) {?>
					    <tr>
					      <td><?php echo $value['usuario'] ?></td>
					      <td><?php echo $value['clave'] ?></td>
					      <td><?php echo $value['tipo'] ?></td>
					      <td><a href="usuarios.php?delete=<?php echo $value['id'] ?>"><button class="btn btn-sm btn-danger">Eliminar</button></a>
					      	<a href="usuarios.php?update=<?php echo $value['id'] ?>"><button class="btn btn-sm btn-primary">Editar</button></a></td>
					    </tr>
					    <?php } ?>
					  </tbody>
					</table>
				</div>
				
			</div>
			<!--FIN TABLA CON DATOS-->


		</main>
		
		<!--FOOTER-->
		<?php require_once("views/footer.php") ?>
	</div>
	
<?php require_once("views/scripts.php") ?>
	</body>
</html>