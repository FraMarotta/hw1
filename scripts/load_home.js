function onResponse(response) {
    console.log('Risposta ricevuta');
    return response.json();
}
function onJsonHome(json){
    console.log("json ricevuto");
    console.log(json);
    infos = document.querySelectorAll(".Info");
    for (let i = 0; i < json.length; i++){
        info = infos[i];
        boxes_img = info.querySelector(".boxes_img");
        img = document.createElement('img');
        img.src = json[i].img;
        boxes_img.appendChild(img);

        boxes_img = info.querySelector(".boxes_img_mobile");
        img = document.createElement('img');
        img.src = json[i].img;
        boxes_img.appendChild(img);

        text = info.querySelector(".boxes_txt");

        title = document.createElement('h1');
        title.classList.add('title');
        title.innerHTML = json[i].destination + " " + json[i].days + " giorni";
        text.appendChild(title);

        ul = document.createElement('ul');
        content = json[i].content.split("\n");
        for(let j = 0; j < content.length; j++){
            li = document.createElement('li');
            li.innerHTML = content[j];
            ul.appendChild(li);
        }
        text.appendChild(ul);

        price = document.createElement('h1');
        price.id = 'Prices';
        price.innerHTML = json[i].price + " €";
        text.appendChild(price);
    }

    
}
console.log("loading home page utente");
/*text = encodeURIComponent("Milano");
img_request = pixabay_endpoint + '?key='  + pixabay_key + '&q=' + text + '&orientation=horizontal';
fetch(img_request).then(onResponse).then(onJsonHome);
*/
fetch("load_home.php").then(onResponse).then(onJsonHome);



