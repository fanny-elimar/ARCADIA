const boutons = document.querySelectorAll('.js-button-voir-avis-supp')
const animals = document.querySelectorAll('.js-clic')

boutons.forEach(function (bouton) {
    bouton.addEventListener('click', function(e) {
      this.classList.add('hidden');
      e.stopPropagation();
    });
  });


  const searchByName = document.getElementById("search-by-name");
  const searchByDate = document.querySelector('#search-by-date');
console.log(crs);
console.log(animals);

  
  function filterByName() {
    let results = document.getElementById("results");
    results.innerHTML="";
    crsfiltered = crs.filter(function(cr) {
      return cr.an_name.toLowerCase().includes(searchByName.value.toLowerCase())})
      showResults(crsfiltered)}    
      
      function filterByDate() {
        let results = document.getElementById("results");
        results.innerHTML="";
        crsfiltered = crs.filter(function(cr) {
          return cr.vi_date==searchByDate.value})
          showResults(crsfiltered)}    

      function showAll() {
        let results = document.getElementById("results");
        results.innerHTML="";
          showResults(crs)}   

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




