function fetchFavorites(){
    fetch("fetch_favorites.php").then(onResponse).then(fetchFavoriteJson);
}
function onResponse(response) {
    return response.json();
}
function fetchFavoriteJson(json){
    console.log(json);
    const Container = document.querySelector('.mete');
    Container.innerHTML='';
    if(json){
        
        for(let i in json){
            const main_div = document.querySelector('.mete');
            const box = document.createElement('div');
            box.classList.add('box');
            main_div.appendChild(box);
            const meta = document.createElement('p');
            const img = document.createElement('img');
            const button = document.createElement('button');
            meta.innerHTML = json[i].meta;
            img.src = json[i].picture;
            button.innerHTML = 'Rimuovi';
            box.appendChild(img);
            box.appendChild(meta);
            box.appendChild(button);

            button.addEventListener('click', unstarDestination);
        }
    }
    else {
        console.log("else");
        const vuoto = document.createElement('h3');
        vuoto.textContent = 'Nessuna meta preferita';
        Container.appendChild(vuoto);
    }

}
function unstarDestination(event){
    const button = event.currentTarget;
    const meta = button.parentNode.querySelector('p').innerHTML;
    console.log(meta);
    fetch("remove_prefer.php?meta="+ meta + " ");
    fetchFavorites();
}

fetchFavorites();