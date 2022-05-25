//keys and endpoints
const covid19_endpoint = "https://covid-api.mmediagroup.fr/v1";

function onResponse(response) {
    console.log('Risposta ricevuta');
    return response.json();
}

function onJsonCovid(json) {
    console.log('JSON covid ricevuto');
    const modale = document.querySelector('#modale');
    // Stampiamo il JSON per capire quali attributi ci servono
    console.log(json);
    const cases = json.All.confirmed;
    const deaths = json.All.deaths;
    const paragraph = document.createElement('div');
    modale.appendChild(paragraph);
    const parText = document.createElement('p');
    paragraph.appendChild(parText);
    parText.innerText = "Casi registrati: " + cases + "\n"  + "Morti registrate: " + deaths;
    fetch(covid19_endpoint + "/vaccines?country=Italy").then(onResponse).then(onJsonVaccination);

}

function onJsonVaccination(json){
    console.log('JSON covid ricevuto');
    // Stampiamo il JSON per capire quali attributi ci servono
    console.log(json);
    const Vaccinated = json.All.people_vaccinated;
    const partiallyVaccinated = json.All.people_partially_vaccinated;
    const modale = document.querySelector('#modale');
    const paragraph = document.createElement('div');
    modale.appendChild(paragraph);
    const parText = document.createElement('p');
    paragraph.appendChild(parText);
    parText.innerText = "Vaccinazioni: " + Vaccinated + "\n"  + "Vaccinazioni Parziali: " + partiallyVaccinated;
}
function onNewsClick(event){
    console.log("clicccato covid 19");
    const modale = document.querySelector('#modale');
    const title = document.createElement('h1');
    title.innerText = "SITUAZIONE COVID ITALIA";
    //devo prendere i dati dall'api_endpoint
    fetch(covid19_endpoint + "/cases?country=Italy").then(onResponse).then(onJsonCovid);
    
    modale.appendChild(title);
	//blocco lo scroll della pagina
	document.body.classList.add('no-scroll');
    //rendo la modale visibile
	modale.classList.remove('hidden');
    modale.addEventListener('click', chiudiModale);
}

function chiudiModale(event) {
	console.log("escape");
    const modale = document.querySelector('#modale');
	//aggiungo la classe hidden 
	modale.classList.add('hidden');
	//riabilito lo scroll
	document.body.classList.remove('no-scroll')
    modale.innerHTML = ' '; //pulisco
}


const news = document.querySelector("#covid");
news.addEventListener('click', onNewsClick);

