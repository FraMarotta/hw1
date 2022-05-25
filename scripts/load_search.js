function onJsonSearch(json) {
    //console.log(json.hits[0].webformatURL);
    if(json.hits.length){
        const dim = 0;
        for(let i = 0; i < json.hits.length; i++ ){
            main_div = document.querySelector('.slideshow-container');

            div = document.createElement('div');
            div.classList.add('mySlides');
            div.classList.add('fade');
            main_div.appendChild(div);

            number = document.createElement('div');
            number.classList.add('numbertext');
            number.innerHTML = i+1 + "/" + json.hits.length;
            div.appendChild(number);

            img = document.createElement('img');
            img.style = "width:100%";
            img.src = json.hits[i].webformatURL;
            div.appendChild(img);

        }
    } else {
            h = document.createElement('h3');
            h.innerHTML = 'Nessuna immagine trovata';
            document.querySelector('body').appendChild(h);
    }
}
function onResponse(response) {
    return response.json();
}
const meta = document.querySelector('#hiddenInfo').value;
console.log(meta); //funziona!
fetch("search_imgs.php?destination=" + meta).then(onResponse).then(onJsonSearch);


