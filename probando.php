<?php 
class conectarse{

	public static function conectar(){
		return $coneccion = new mysqli('localhost','root','','bd');
	}
}


 ?>

<?php 

 ?>


<form action="index.php" method="port" enctype="multipart/form-data">
	

</form>

<?php 

class conectarse{
	public static function conectarse(){
		return $resultado = new mysqli(servidor, usuario, pass, bd)
	}
}

if(isset($_GET["registrado"])){
	$_SESSION["nombre"]="oscar";
	$_SESSION["foto"]=$_FILES["imagen"]["name"];
	$insertar = conectarse::conectar()->query("insert into personas values()");
	$recibir = conectarse::conectar()->query("select * from personas where x");
	$recibir->fetch_assoc();

	$recibir_todo = conectarse::conectar()->query("select * from weas");
	foreach ($recibir_todo as $value) {
		$value["nombre"];
	}
	header('location:index.php?msg=error&msg2=webeo');
}

 ?>
