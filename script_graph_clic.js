let count = animals.length;
const step = 10;

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
  canvasDiv.append(newCanvas);

  let myChart = new Chart(newCanvas, {
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