const searchByName = document.getElementById("search-by-name");
const searchByDate = document.querySelector('#search-by-date');
const url = '../api/visits.php';

function filterByName() {
    const nameFilter = searchByName.value.toLowerCase()
    fetchDataWithNameFilter(url, nameFilter);
    let results = document.getElementById("results");
    results.innerHTML="";
}

function filterByDate() {
    const dateFilter = searchByDate.value;
    fetchDataWithDateFilter(url, dateFilter);
    let results = document.getElementById("results");
    results.innerHTML="";
}    

function showAll() {
    fetchData(url);     
    let results = document.getElementById("results");
    results.innerHTML="";
}

function fetchData(url) {
    fetch(url)
        .then(response => {
        return response.json(); // Parse the response body as JSON
        })
    .then(data => {showResults(data)})
    .catch(error => {
        console.error('There has been a problem with your fetch operation:', error);
        alert('Une erreur est survenue lors de la récupération des données.');
    });
}

function fetchDataWithNameFilter(url, filterValue) {
fetch(url)
        .then(response => {
        return response.json(); // Parse the response body as JSON
        })
    .then(data => {
        crsfiltered = data.filter(function(cr) {
            return cr.an_name.toLowerCase().includes(filterValue)})
        if (crsfiltered.length==0) {
            results.innerHTML='Il n\'existe pas de compte-rendu de visite pour ce nom.'
        } else {
            showResults(crsfiltered)
        }
    })
    .catch(error => {
        console.error('There has been a problem with your fetch operation:', error);
        alert('Une erreur est survenue lors de la récupération des données.');
    });
}

function fetchDataWithDateFilter(url, filterValue) {
fetch(url)
        .then(response => {
        return response.json(); // Parse the response body as JSON
        })
    .then(data => {
            crsfiltered = data.filter(function(cr) {
                return cr.vi_date==filterValue})
            if (crsfiltered.length==0) {
                results.innerHTML='Il n\'existe pas de compte-rendu de visite pour cette date.'
            } else {
                showResults(crsfiltered)
            }
    })
    .catch(error => {
        console.error('There has been a problem with your fetch operation:', error);
        alert('Une erreur est survenue lors de la récupération des données.');
    });
}

function showResults(crsfiltered) {
    for (let element of crsfiltered) {
        let newDiv = document.createElement('div');
        newDiv.classList.add("col-md-3", "col", "border", "rounded", "m-3", "light", "cr-card");
        results.prepend(newDiv);
        let newP1 = document.createElement('h5');
        newDiv.prepend(newP1);
        newP1.classList.add("d-flex", "justify-content-center","my-3");
        newP1.innerHTML=element['an_name'];
        let newP2 = document.createElement('p');
        newDiv.append(newP2);
        newP2.innerHTML="Espèce : ".concat(element['an_species']);
        let newP3 = document.createElement('p');
        newDiv.append(newP3);
        newP3.innerHTML="Date : ".concat(element['vi_date']);
        let newP4 = document.createElement('p');
        newDiv.append(newP4);
        newP4.innerHTML="Etat : ".concat(element['vi_condition']);
        let newP5 = document.createElement('p');
        newDiv.append(newP5);
        newP5.innerHTML="Détails : ".concat(element['vi_condition_details']);
    }
}   


