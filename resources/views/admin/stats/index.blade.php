@extends('layouts.app')
@section('content')
<div>
  <canvas id="myChart"></canvas>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('myChart');

    // Estrai i dati appropriati dall'array associativo
    const dataCounts = Object.values(@json($ordersData)).map(item => item.orderCount);
    const dataAmounts = Object.values(@json($ordersData)).map(item => item.totalSalesAmount);
    const labels = Object.keys(@json($ordersData));

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Ordini per mese',
                data: dataCounts,
                backgroundColor: 'rgba(255, 99, 132, 0.2)', // Colore per il conteggio degli ordini
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1,
                yAxisID: 'orders' // Assegna un ID all'asse Y per il conteggio degli ordini
            }, {
                label: 'Ammontare per mese',
                data: dataAmounts,
                backgroundColor: 'rgba(54, 162, 235, 0.2)', // Colore per l'ammontare degli ordini
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
                yAxisID: 'sales' // Assegna un ID all'asse Y per l'ammontare delle vendite
            }]
        },
        options: {
            scales: {
                yAxes: [{ // Definisci i due assi Y
                    id: 'orders',
                    type: 'linear',
                    position: 'left',
                    ticks: {
                        beginAtZero: true
                    }
                }, {
                    id: 'sales',
                    type: 'linear',
                    position: 'right',
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>


@endsection