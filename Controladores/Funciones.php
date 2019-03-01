<?php 
require_once("Modelo/coneccion.php");


class funciones{
	
	function login($usuario){
		$resultado = conexion::conectar()->query("select * from usuarios where usuario = '$usuario'");
		return $resultado->fetch_assoc();
	}

	function registrar($usuario,$clave,$nombre,$apellido,$imagen,$nacionalidad){
		$resultado = conexion::conectar()->query("insert into usuarios values(null,'$usuario','$clave','$nombre','$apellido','$imagen','$nacionalidad', 'usuario')");

		return $resultado;
	}

	function comentarios($id,$comentarios){
		$resultado = conexion::conectar()->query("insert into comentarios values(null,$id,null,'$comentarios')");
		return $resultado;
	}

	function traer_comentarios(){
		$resultado = conexion::conectar()->query("select comentarios.id, usuarios.nombre, usuarios.apellido, comentarios.fecha, comentarios.comentario, usuarios.imagen, usuarios.nacionalidad FROM comentarios inner join usuarios on usuarios.id=comentarios.id_usuario");
		return $resultado;
	}

	function borrar_comentario($id){
		$resultado = conexion::conectar()->query("delete from comentarios where id=$id");
	}

	function borrar_persona($id){
		$resultado = conexion::conectar()->query("delete from usuarios where id=$id");
	}

	function traer_personas(){
		$resultado = conexion::conectar()->query("select* from usuarios");
		return $resultado;
	}

	function traer_persona($id){
		$resultado = conexion::conectar()->query("select * from usuarios where id=$id");
		return $resultado->fetch_assoc();
	}

	function modificar_persona($id,$usuario,$password,$tipo){
		$resultado = conexion::conectar()->query("update usuarios set usuario = '$usuario', clave = '$password', tipo = '$tipo' where id = $id");
	}


}




 ?>