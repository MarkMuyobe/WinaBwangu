const ctx = document.getElementById('barchart');
const labels = ['Wina1','Wina2','Wina3','Wina4','Wina5','Wina6'];
new Chart(ctx, {
  type: 'bar',
  data : {
    labels: labels,
    datasets: [{
      label: 'Booth Revenue',
      data: [100, 320, 710, 260, 110, 130],
      backgroundColor: [
        'rgba(255, 99, 132, 0.7)',
        'rgba(255, 159, 64, 0.7)',
        'rgba(255, 205, 86, 0.7)',
        'rgba(75, 192, 192, 0.7)',
        'rgba(54, 162, 235, 0.7)',
        'rgba(153, 102, 255, 0.7)'
      ],
      borderColor: [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)'
      ],
      borderWidth: 1
    }],
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    },
  }
 
});
 

 