const ctx2 = document.getElementById('doughnut');
new Chart(ctx2, {
  type: 'doughnut',
  data: {
    labels: [
      'Total Revenue',
      'Total Capital',
    ],
    datasets: [{
      label: 'Totals',
      data: [300,100],
      backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)'
      ],
      hoverOffset: 4
    }]
  }
});