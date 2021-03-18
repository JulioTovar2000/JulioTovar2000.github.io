let xhr = new XMLHttpRequest();
let ul = document.getElementById("lista_artistas");

if (ul) {
    console.log(1);
} else {
    console.log(2);
}


xhr.open('GET', 'servidor_artistas.php', true);
xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 && xhr.status == 200) {
        let json = JSON.parse(xhr.responseText);

        for (let key in json) {
            let li = document.createElement('li');
            let h3 = document.createElement("h3");
            let p = document.createElement("p");
            let br = document.createElement("br");

            h3.innerText = json[key][0];
            p.innerHTML = "<img src='" + json[key][2] + "'>" + json[key][1];
            li.appendChild(h3);
            li.appendChild(p);
            ul.appendChild(li);
        }       
    }
}

xhr.send();