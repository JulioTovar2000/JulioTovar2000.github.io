function cambiar_fondo(){
	//let body = document.getElementsByTagName("body")[0];
	let body = document.querySelector("body");
	body.style.backgroundColor= body.style.backgroundColor== "orange"?"yellow":"orange";
}



let intervalo;

function cambiar_con_intervalo(){
	intervalo=setInterval(cambiar_fondo, 2000);
}
function detener() {
	clearInterval(intervalo);
}
function cambiar(){
	setTimeout(cambiar_fondo,3000);
}