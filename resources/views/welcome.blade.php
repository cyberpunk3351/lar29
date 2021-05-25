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
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
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
                        <div id="message" x-data="{ showMessage: true, message: '' }">
                            <div x-show="showMessage">
                                <p class="text-sm leading-5 font-medium text-gray-900" x-text="message"></p>
                            </div>
                        </div>

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

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script>
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
            labels: [1, 2, 3, 4],
            datasets: [{
                label: 'data',
                data: [4, 3, 2, 1],
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
        // var updateChart = function() {
        //     $.ajax({
        //     url: "{{ route('chart') }}",
        //     type: 'GET',
        //     dataType: 'json',
        //     success: function(data) {
        //         myChart.data.labels = data.labels;
        //         myChart.data.datasets[0].data = data.data;
        //         myChart.update();
        //     },
        //     error: function(data){
        //         console.log(data);
        //     }
        //     });
        // }
        
        // updateChart();
        // myChart.destroy();
        // myChart.update(); 


            Echo.channel('events')
            .listen('RealTimeMessage', (e) => {
                // myChart.data.datasets[0].data = e.data;
                // myChart.data.labels = e.data;
                var lab = e.data;
                // var labString = lab.toString();

                // function adddata(){
                //     myChart.data.datasets[0].data = e.data;
                //     myChart.data.labels = e.data;
                //     myChart.update();
                // }

                // adddata();

                // myChart.data.datasets.forEach((dataset) => (
                //     dataset.data.push(lab).data
                // ));
                // myChart.data.datasets[0].data.push(lab.one);
                // myChart.data.labels.push(lab.name);

                // for (let key in lab) {
                    
                    // myChart.data.labels.push(lab[key]);
                //     console.log( lab[key] ); // Яблоко, Апельсин, Груша
                // };

                Object.keys(lab).forEach(function(k){
                    myChart.data.labels.push(k);
                    myChart.data.datasets[0].data.push(lab[k]);
                    console.log(k);
                    console.log(lab[k]);
                    // console.log(k + ' - ' + lab[k]);
                });

                myChart.update();
                // console.log(lab);
            }); 
    </script>

</body>

</html>