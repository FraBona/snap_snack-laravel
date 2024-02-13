@extends('layouts.app')
@section('content')
<div>
  <canvas id="myChart"></canvas>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');
  // const months = [
  //   'Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno',
  //   'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'
  // ];
  const currentYear = new Date().getFullYear();
  const years = [];

  for (let i = 0; i < 0; i++) {
    const year = currentYear - i;
    for (let month = 1; month <= 12; month++) {
      years.push({ year: year, month: month });
    }
  }


  let labels = @json($orderCountsByMonth);
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: years,
      datasets: [{
        label: '# of Votes',
        data: labels,
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
@endsection