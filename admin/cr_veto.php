<?php
require_once 'templates/_header.php';
require_once '../lib/pdo.php';
require_once '../lib/visit.php';

$messages =[];
$errors =[];
?>



<h1>Comptes-rendus du vétérinaire</h1>
<div class="col-md-2 col-sm-5 md-mb-1 mb-3 align-items-center d-flex">
            <button type="button" class="btn btn-sm btn-primary"  onclick="">Chercher ajax</button>
        </div>
    <div class="row">
        <div class="col-md-3 col-sm-6 md-mb-1 mb-3">
            <input type="text" class="form-control" id="search-by-name" placeholder="Nom...">
        </div>
        <div class="col-md-2 col-sm-5 md-mb-1 mb-3 align-items-center d-flex">
            <button type="button" class="btn btn-sm btn-primary"  onclick="filterByName();">Chercher</button>
        </div>
        <div class="col-md-3 col-sm-6 md-mb-1 mb-3 md-ms-5">
            <input type="date" class="form-control" id="search-by-date" placeholder="Date...">
        </div>
        <div class="col-md-2 col-sm-5 md-mb-1 mb-3 align-items-center d-flex">
            <button type="button" class="btn btn-sm btn-primary"  onclick="filterByDate();">Chercher</button>
        </div>
    </div>
    <div class="col-md-2 col-sm-5 md-mb-1 mb-3 align-items-center d-flex">
        <button type="button" class="btn btn-sm btn-primary"  onclick="showAll();">Tout afficher</button>
    </div>
    <div class="row" id="results">
    </div>
</div>

<?php
require_once '../templates/_footer.php'

//<script src="../script_cr_veto.js"></script>
?>
<script> 
  const searchByName = document.getElementById("search-by-name");
  const searchByDate = document.querySelector('#search-by-date');


function filterByName() {
    const url = '../api/visits.php';
    const filterValue = searchByName.value.toLowerCase()
    fetchDataWithNameFilter(url, filterValue);
    let results = document.getElementById("results");
    results.innerHTML="";
}

function filterByDate() {
    const url = '../api/visits.php';
    const filterValue = searchByDate.value;
    fetchDataWithDateFilter(url, filterValue);
    let results = document.getElementById("results");
    results.innerHTML="";
}    

function showAll() {
    const url = '../api/visits.php';
    fetchData(url);     
    let results = document.getElementById("results");
    results.innerHTML="";
}

function fetchDataWithNameFilter(url, filterValue) {
fetch(url)
        .then(response => {
        console.log(response.status); // Retrieve the response status code
        console.log(response.statusText); // Retrieve the status text
        console.log(response.headers.get('Content-Type')); // Retrieve a specific header value
        return response.json(); // Parse the response body as JSON
        })
    .then(data => {
        console.log(data)
        crsfiltered = data.filter(function(cr) {
        return cr.an_name.toLowerCase().includes(filterValue)})
        if (crsfiltered.length==0) {results.innerHTML='Il n\'existe pas de compte-rendu de visite pour ce nom.'} else {

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
    }})
    .catch(error => {
    // Handle errors
    });
}

function fetchDataWithDateFilter(url, filterValue) {
fetch(url)
        .then(response => {
        console.log(response.status); // Retrieve the response status code
        console.log(response.statusText); // Retrieve the status text
        console.log(response.headers.get('Content-Type')); // Retrieve a specific header value
        return response.json(); // Parse the response body as JSON
        })
    .then(data => {
            crsfiltered = data.filter(function(cr) {
            return cr.vi_date==filterValue})
            console.log(crsfiltered)
            if (crsfiltered.length==0) {results.innerHTML='Il n\'existe pas de compte-rendu de visite pour cette date.'} else {

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
    }})
        
        
    .catch(error => {
        console.error('There has been a problem with your fetch operation:', error);
        alert('Une erreur est survenue lors de la récupération des données.');
    });
}

function fetchData(url) {
    fetch(url)
        .then(response => {
        console.log(response.status); // Retrieve the response status code
        console.log(response.statusText); // Retrieve the status text
        console.log(response.headers.get('Content-Type')); // Retrieve a specific header value
        return response.json(); // Parse the response body as JSON
        })
    .then(data => {
        console.log(data)
        for (let element of data) {
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
    })
    .catch(error => {
    // Handle errors
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
        newP5.innerHTML="Détails : ".concat(element['vi_condition_details']);}}
      
/*<div class="col-md-3 border rounded m-1">
<p><?=$cr['an_name'];?></p>
<p><?=$cr['an_species'];?></p>
<p><?=$cr['vi_date'];?></p>
<p><?=$cr['vi_condition'];?></p>
<p><?=$cr['vi_condition_details'];?></p>
</div>
/*
        console.log(crs);
        crsfiltered = crs.filter(function(cr) {
          return cr.an_name =="Jo"});
        console.log(crsfiltered);
*/
/*function myFunction() {
  crsfiltered = crs.filter(function(cr) {
    return cr.an_name ==searchByName.value
  });
}*/





        </script>