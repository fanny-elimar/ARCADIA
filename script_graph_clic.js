 

  let count = animals.length;
  console.log(count);
  const step = 10;
console.log(Math.ceil(count/step));

 function getTenAnimals(startPosition) {    
   tenAnimals = animals.slice(startPosition, startPosition+step);
   let labels = [];
   for (let i = 0; i < tenAnimals.length; i++) {
   labels.push(tenAnimals[i]['nom']);
   }
   numberOfClics = [];
   for (let i = 0; i < tenAnimals.length; i++) {
   numberOfClics.push(tenAnimals[i]['clic']);
   }
   let canvasDiv = document.getElementById("canva");
   canvasDiv.innerHTML = "";
   let newCanvas = document.createElement('canvas');
   newCanvas.setAttribute('id', 'myChart');
       canvasDiv.prepend(newCanvas);
   const ctx = document.getElementById('myChart');
   
   let myChart = new Chart(ctx, {
   type: 'bar',
   data: {
     labels: labels,
     datasets: [{
       label: 'Nombre de clics',
       data: numberOfClics,
       borderWidth: 1,
       backgroundColor: "#617A55",
     }]
   },
   options: {
     scales: {
       y: {
         beginAtZero: true
       }
     }
   }
 })
};
 