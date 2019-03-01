<!DOCTYPE html>
<html lang="es">
<?php 
require_once("views/header.php");
include("Controladores/Funciones.php");?>

	<body>

	<?php
	session_start();

	if(isset($_POST['Ingresar'])){
		$usuario = $_POST['usuario'];
		$password = $_POST['password'];
		$array_login = funciones::login($usuario);
		if($usuario == $array_login['usuario'] && $password == $array_login['clave']){
			$_SESSION['id'] = $array_login['id'];
			$_SESSION['usuario'] = $array_login['usuario'];
			$_SESSION['password'] = $array_login['clave'];
			$_SESSION['nombre'] = $array_login['nombre'];
			$_SESSION['apellido'] = $array_login['apellido'];
			$_SESSION['imagen'] = $array_login['imagen'];
			$_SESSION['nacionalidad'] = $array_login['nacionalidad'];
			$_SESSION['tipo'] = $array_login['tipo'];
			
		}else{
			header('location:index.php?error=1');
		}
	}

	if(isset($_POST['Registrarse'])){
		$usuario_registro = $_POST['usuario_registro'];
		$contraseña_registro = $_POST['contraseña_registro'];
		$nombre_registro = $_POST['nombre_registro'];
		$apellido_registro = $_POST['apellido_registro'];
		$foto_registro = $_FILES['foto_registro']['name'];
		if($foto_registro==""){
			$foto_registro="perfil.jpg";
		}
		$nacionalidad_registro = $_POST['nacionalidad_registro'];
		$verificacion=funciones::login($usuario_registro);
		
		if(!$verificacion){
			$resultado = funciones::registrar($usuario_registro,$contraseña_registro,$nombre_registro,$apellido_registro,$foto_registro,$nacionalidad_registro);
			move_uploaded_file($_FILES['foto_registro']['tmp_name'],"img/".$_FILES['foto_registro']['name']);
			if($resultado){
			$_SESSION['usuario'] = $usuario_registro;
			$_SESSION['password'] = $contraseña_registro;
			$_SESSION['nombre'] = $nombre_registro;
			$_SESSION['apellido'] = $apellido_registro;
			$_SESSION['imagen'] = $foto_registro;
			$_SESSION['nacionalidad'] = $nacionalidad_registro;
			$_SESSION['tipo'] = "usuario";

			$persona=funciones::login($usuario_registro);
			$_SESSION['id'] = $persona['id'];
			header('location:index.php?msg=registrado');
			} else {
				header('location:index.php?error=3');
			}
		}else{
			header('location:index.php?error=4');
		}
		
		
		
	}

	//1 contra incorrecta, 2 sin permiso para paginas, 3 error de registro, 4 ya existe el usuario

	?>

	<div class="container-fluid p-0">
		<!--EMPIEZA HEADER!-->
		<!--NAVBAR, TOP, CAROUSEL Y MODAL-->
		<?php require_once("views/nav.php");?>
		
		<!--TITULO-->
		<main class="container-fluid m-0 p-0">

			<!--SLIDER PRINCIPAL-->
			<div class="row p-0 m-0 p-0">
				<div class="col-12 p-0 m-0">
					<div id="carouselExamplecaptions" class="carousel slide carousel-fade" data-ride="carousel">

					  <ol class="carousel-indicators">
					    <li data-target="#carouselExamplecaptions" data-slide-to="0" class="active"></li>
					    <li data-target="#carouselExamplecaptions" data-slide-to="1"></li>
					    <li data-target="#carouselExamplecaptions" data-slide-to="2"></li>
					  </ol>

					  <div class="carousel-inner">
					    <div class="carousel-item active">
					      <img class="img-fluid" src="img/carousel1.jpeg" alt="First slide">
					      <div class="carousel-caption d-none d-md-block">
						    <h5>Comparte momentos inolvidables</h5>
						    <p>Los mejores momentos son con las personas con quienes te entiendes!</p>
						  </div>
					    </div>
					    <div class="carousel-item">
					      <img class="img-fluid" src="img/carousel2.jpeg" alt="Second slide">
					      <div class="carousel-caption d-none d-md-block">
						    <h5>Nunca es tarde para aprender algo</h5>
						    <p>Puedes encontrar diversos topicos dentro del foro</p>
						  </div>
					    </div>
					    <div class="carousel-item">
					      <img class="img-fluid" src="img/carousel3.jpeg" alt="Third slide">
					      <div class="carousel-caption d-none d-md-block">
						    <h5>Cambia la forma de pensar</h5>
						    <p>No hay nada peor que encerrarse en una burbuja, rompela y comparte las diferentes ideologias que la gente posee.</p>
						  </div>
					    </div>
					  </div>
					  
					  <a class="carousel-control-prev" href="#carouselExamplecaptions" role="button" data-slide="prev">
					    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					  </a>
					  <a class="carousel-control-next" href="#carouselExamplecaptions" role="button" data-slide="next">
					    <span class="carousel-control-next-icon" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>
					</div>
				</div>
			</div>

			<div class="container">
				<div class="row mb-5 mt-2">
					<div class="col-12">

						<?php if(isset($_GET['msg']) && $_GET['msg'] == 'salir') {?>
						<div class="alert alert-success alert-dismissible fade show" role="alert">
						  <strong>Sesion cerrada satisfactoriamente</strong>
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>
						<?php } ?>

						<?php if(isset($_GET['msg']) && $_GET['msg'] == 'registrado') {?>
						<div class="alert alert-success alert-dismissible fade show" role="alert">
						  <strong>Usuario registrado satisfactoriamente</strong>
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>
						<?php } ?>

						<?php if(isset($_GET['error']) && $_GET['error'] == '1') {?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
						  <strong>Usuario o Contraseña incorrecta.</strong>
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>
						<?php } ?>

						<?php if(isset($_GET['error']) && $_GET['error'] == '2') {?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
						  <strong>Para acceder a esa pagina debe iniciar sesion primero</strong>
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>
						<?php } ?>

						<?php if(isset($_GET['error']) && $_GET['error'] == '3') {?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
						  <strong>Error al registrarse, porfavor verifique los datos</strong>
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>
						<?php } ?>
						<?php if(isset($_GET['error']) && $_GET['error'] == '4') {?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
						  <strong>Error, ya existe el usuario, por favor escoja otro usuario</strong>
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>
						<?php } ?>

						<h1 class="text-center mt-5">Bienvenido al Foro Abierto</h1>
						<h5 class="text-center text-muted"><em>En este espacio tendras la oportunidad de hablar de temas interesantes o topicos de moda, en la parte superior tendras las opciones para navegar por esta aplicacion web.</em></h5>
						<br>
						<hr>
					</div>

				</div>
			</div>

		</main>
		
		<!--FOOTER-->
		<?php require_once("views/footer.php") ?>
	</div>
	
<?php require_once("views/scripts.php") ?>
	</body>
</html>