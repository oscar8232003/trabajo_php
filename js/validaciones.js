
function validar_nombre(){
	var nombre = document.getElementById("nombre_registro");
	var span_nombre = document.getElementById("nombre_registro-invalid");
	nombre.classList.remove("is-valid");
	nombre.classList.remove("is-invalid");
	if(!nombre.value ==""){
		if(nombre.value.length < 30){
			nombre.classList.add("is-valid");
			return true;
		}else{
			span_nombre.innerHTML="Son maximo 30 letras por nombre.";
			nombre.classList.add("is-invalid");
			return false;
		}
	}else{
		span_nombre.innerHTML="Por favor rellene el campo en blanco.";
		nombre.classList.add("is-invalid");
		return false;
	}
}

function validar_apellido(){
	var apellido = document.getElementById("apellido_registro");
	var span_apellido = document.getElementById("apellido_registro-invalid");
	apellido.classList.remove("is-valid");
	apellido.classList.remove("is-invalid");
	if(!apellido.value ==""){
		if(apellido.value.length < 30){
			apellido.classList.add("is-valid");
			return true;
		}else{
			span_apellido.innerHTML="Son maximo 30 letras por apellido.";
			apellido.classList.add("is-invalid");
			return false;
		}
	}else{
		span_apellido.innerHTML="Por favor rellene el campo en blanco.";
		apellido.classList.add("is-invalid");
		return false;
	}
}

function validar_usuario(){
	var usuario = document.getElementById("usuario_registro");
	var span_usuario = document.getElementById("usuario_registro-invalid");
	usuario.classList.remove("is-valid");
	usuario.classList.remove("is-invalid");
	if(!usuario.value ==""){
		if(usuario.value.length < 30){
			usuario.classList.add("is-valid");
			return true;
		}else{
			span_usuario.innerHTML="Son maximo 30 letras por usuario.";
			usuario.classList.add("is-invalid");
			return false;
		}
	}else{
		span_usuario.innerHTML="Por favor rellene el campo en blanco.";
		usuario.classList.add("is-invalid");
		return false;
	}
}

function validar_password(){
	var password = document.getElementById("contraseña_registro");
	var span_password = document.getElementById("contraseña_registro-invalid");
	password.classList.remove("is-valid");
	password.classList.remove("is-invalid");
	if(!password.value ==""){
		if(password.value.length < 30){
			password.classList.add("is-valid");
			return true;
		}else{
			span_password.innerHTML="Son maximo 30 letras por password.";
			password.classList.add("is-invalid");
			return false;
		}
	}else{
		span_password.innerHTML="Por favor rellene el campo en blanco.";
		password.classList.add("is-invalid");
		return false;
	}
}

/*VALIDA EL FORMULARIO DE REGISTRO DE USUARIOS*/
function validar_registro(){

	if(validar_nombre() && validar_apellido() && validar_usuario() && validar_password()){
		return true;
	}else{
		return false;
	}	
}

/*VALIDA LA ENTRADA DE USUARIOS (LOGIN)*/

function validar_usuario_entrada(){
	var usuario = document.getElementById("usuario");
	var span_usuario = document.getElementById("usuario-invalid");
	usuario.classList.remove("is-valid");
	usuario.classList.remove("is-invalid");
	if(!usuario.value ==""){
		usuario.classList.add("is-valid");
		return true;
	}else{
		span_usuario.innerHTML="Por favor rellene el campo en blanco.";
		usuario.classList.add("is-invalid");
		return false;
	}
}

function validar_password_entrada(){
	var password = document.getElementById("password");
	var span_password = document.getElementById("password-invalid");
	password.classList.remove("is-valid");
	password.classList.remove("is-invalid");
	if(!password.value ==""){
		password.classList.add("is-valid");
			return true;
	}else{
		span_password.innerHTML="Por favor rellene el campo en blanco.";
		password.classList.add("is-invalid");
		return false;
	}
}

function validar_entrada(){

	if(validar_usuario_entrada() && validar_password_entrada()){
		return true;
	}else{
		return false;
	}	
}

/*Validando usuarios*/

function validar_usuario_entrada2(){
	var usuario2 = document.getElementById("usuario2");
	var span_usuario2 = document.getElementById("usuario2-invalid");
	usuario2.classList.remove("is-valid");
	usuario2.classList.remove("is-invalid");
	if(!usuario2.value ==""){
		usuario2.classList.add("is-valid");
		return true;
	}else{
		span_usuario2.innerHTML="Por favor rellene el campo en blanco.";
		usuario2.classList.add("is-invalid");
		return false;
	}
}

function validar_password_entrada2(){
	var password2 = document.getElementById("password2");
	var span_password = document.getElementById("password2-invalid");
	password2.classList.remove("is-valid");
	password2.classList.remove("is-invalid");
	if(!password2.value ==""){
		password2.classList.add("is-valid");
			return true;
	}else{
		span_password2.innerHTML="Por favor rellene el campo en blanco.";
		password2.classList.add("is-invalid");
		return false;
	}
}

function validar_usuarios(){

	if(validar_usuario_entrada2() && validar_password_entrada2()){
		return true;
	}else{
		return false;
	}	
}