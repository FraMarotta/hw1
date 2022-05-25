function onJson(json){
    console.log(json);
}
function onSearch(event){
    event.preventDefault();
    const content = document.querySelector('#barra').value;
    window.open("search.php?destination=" + content, "_self");
    document.querySelector('#barra').value = '';
}

travel_search = document.querySelector('#search_content');
travel_search.addEventListener('submit', onSearch);
