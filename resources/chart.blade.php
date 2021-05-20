<!DOCTYPE html>
<html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real-Time Chart</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

    <div class="content container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Dashboard
                    </div>

                    <div class="card-body">
                        @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <h3>Data update</h3>
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>

    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script>
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
            labels: [],
            datasets: [{
                label: 'data',
                data: [],
                borderWidth: 1
            }]
            },
            options: {
            scales: {
                xAxes: [],
                yAxes: [{
                ticks: {
                    beginAtZero:true
                }
                }]
            }
            }
        });
        var updateChart = function() {
            $.ajax({
            url: "{{ route('chart') }}",
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                myChart.data.labels = data.labels;
                myChart.data.datasets[0].data = data.data;
                myChart.update();
            },
            error: function(data){
                console.log(data);
            }
            });
        }
        
        updateChart();
        setInterval(() => {
            updateChart();
        }, 1000);
    </script>

</body>

</html>