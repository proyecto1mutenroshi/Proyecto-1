
function cifrar(){
	var input_pass = document.getElementById("Contraseña");
	input_pass.value = sha1(input_pass.value);
}
