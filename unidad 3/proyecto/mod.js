
let seleccion = document.getElementById(artist);
let A = new XMLHttpRequest();
let select = document.getElementById("artist");

A.open('GET', 'servidor_artistas.php', true);
A.onreadystatechange = function() {
    if (A.readyState == 4 && A.status == 200) {
        let json = JSON.parse(A.responseText);

        for (let key in json) {
            let option = document.createElement('option');
            option.selectedIndex = key;
            option.innerHTML = (json[key][0]);

            select.appendChild(option);
        }       
    }
}

A.send();

select.addEventListener("change",actualizar);

function actualizar(){
    var opcion = select.selectedIndex+1;
    console.log(opcion);
    mostrar_info(opcion);
}

function mostrar_info(key){
    let xhr = new XMLHttpRequest();
    xhr.open('GET', 'servidor_artistas.php', true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            let json = JSON.parse(xhr.responseText);

            nombre = document.getElementById('myname');
            desc = document.getElementById('desc');
            nombre.value = json[key][0];
            desc.value = json[key][1];
        }
    }

    xhr.send();
}