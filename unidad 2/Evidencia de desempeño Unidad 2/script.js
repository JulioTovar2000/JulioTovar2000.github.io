let tabla = document.getElementById('tabla');
let resultados = document.getElementById('resultados');
let multi;
let imprimir;
function operacion(){
if(tabla == 1 && tabla <=50){
	//Se efectua la operacion
	if (resultados==1 && resultados <=20) {
		for(let i=1;i<=resultados.value;i++){
		
		imprimir.querySelector('.resultados') += `${tabla.value} * ${i} = ${tabla.value*i} <br />`
	}
}else{
	//Alerta
	alert("Ingrese un valor entre 1 y 20");
}
	

}else{
	//Aqui se lanza una alerta
	alert("Ingrese un valor entre 1 y 50");
}
}