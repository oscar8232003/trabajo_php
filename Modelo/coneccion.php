<?php 

class conexion{

	function conectar(){
		$conectarse = new mysqli('localhost','root','oskar823','foro');
		return $conectarse;
	}

}


 ?>