function validar(){

	var nombres, apellidos, correo, usuario, apodo, clave , exprecion;

	nombres = document.getElementById("nombres").value;
	apellidos = document.getElementById("apellidos").value;
	correo = document.getElementById("correo").value;
	apodo = document.getElementById("apodo").value;
	clave = document.getElementById("clave").value;

	if (nombres === "" || apellidos ==="" || correo === "" || apodo === "" || clave === "") 

		alert("el campo nombre esta vacio ");
		return false;
	else if (nombres.length>15){
		alert("el nombre es muy largo")
	}else if (apellidos.length>20){
		alert("el nombre es muy largo")
	}else if (nombre.length>15){
		alert("el nombre es muy largo")
	}else if (nombre.length>15){
		alert("el nombre es muy largo")
	}	





}