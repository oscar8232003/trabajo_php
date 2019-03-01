<!DOCTYPE html>
<html lang="es">
<?php require_once("views/header.php");
include("Controladores/Funciones.php");?>
	<body>

	<?php
	session_start();
	if(!isset($_SESSION['usuario'])){
		header('location:index.php?error=2');
	}

	if(isset($_POST['publicar'])){
		$id = $_SESSION['id'];
		$comentarios = $_POST['comentarios'];
		$insertar_comentario = funciones::comentarios($id,$comentarios);
	}
	
	if(isset($_GET['delete'])){
		$id_borrar = $_GET['delete'];
		$borrado = funciones::borrar_comentario($id_borrar);
	}

	$listado = funciones::traer_comentarios();
	?>
	

	<div class="container-fluid p-0">
		<?php require_once("views/nav.php");?>
		
		
		<main class="container">

			<div class="row mb-5 mt-2">
				<div class="col-12">
					<!--TITULO-->
					<h1 class="text-center mt-5">Foro Abierto!</h1>
					<h5 class="text-center text-muted"><em>Mas abajo encontraras la seccion para realizar un post!</em></h5>
					<br>
					<hr>
				</div>
			</div>

			<!--CUERPO DE LA LISTA DEL FORO-->

			<div class="row">
				<?php foreach ($listado as $value) {?>	
				<div class="col-12">
					<div class="media shadow rounded">
					  <img class="m-3 rounded-circle shadow " src="img/<?php echo $value['imagen']?>" width="128" >
					  <div class="media-body">
					    <h5 class="mt-0"><?php echo $value['nombre'].' '.$value['apellido']?></h5>					 
					    <p class="small mb-1"><strong><?php echo $value['fecha'].' | '.$value['nacionalidad']?></strong></p>
					    <?php if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'administrador') {?>
					    <a href="contenido.php?delete=<?php echo $value['id']?>"><button class="btn btn-sm btn-danger"><strong>Eliminar</strong></button></a>
						<?php } ?>
					    <p><?php echo $value['comentario']?></p>
					  </div>
					</div>
				</div>
				
				<hr class="m-3">
				<?php } ?>
			</div>

			<!--FIN DEL CUERPO DEL FORO-->

			<!--FORMULARIO DE POSTS-->
			<form action="contenido.php" method="post" class="row">
				<div class="col-12">
				  <div class="form-group">
				    <label for="comentarios"><strong>Digite Aqui para poder publicar su comentario</strong></label>
				    <textarea class="form-control" id="comentarios" name="comentarios" rows="3"></textarea>
				  </div>
				  <div class="form-group">
				  	<button type="submit" class="btn btn-success" name="publicar">Publicar</button>
				  </div>
			  </div>
			</form>
			<!--FIN FORMULARIO DE POSTS-->

		</main>
		
		<!--FOOTER-->
		<?php require_once("views/footer.php") ?>
	</div>
	
<?php require_once("views/scripts.php") ?>
	</body>
</html>