<!DOCTYPE html>

<head>
    <title>Pusher Test</title>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>

    Pusher.logToConsole = true;

    var pusher = new Pusher('b6b048bccd4fcbb11477', {
        cluster: 'eu'
    });

    // var channel = pusher.subscribe('my-channel');
    // channel.bind('pusher:subscription_succeeded', function(members) {
    //     alert('successfully subscribed!');
    // });
    // channel.bind('my-event', function(data) {
    //     console.log(JSON.stringify(data));
    // });
    </script>
</head>

<body>
    <h1>Pusher Test</h1>
    <p>
        Try publishing an event to channel <code>my-channel</code>
        with event name <code>my-event</code>.
    </p>

    <div id="message" x-data="{ showMessage: true, message: '' }">
        <div x-show="showMessage">
            <p class="text-sm leading-5 font-medium text-gray-900" x-text="message"></p>
        </div>
    </div>

    <canvas id="myChart"></canvas>

    <script>
        let ctx = document.getElementById("myChart");


                let channel = pusher.subscribe('my-channel');
                channel.bind('my-event', function(data) {

                    // data.datasets[data] = data;
                let myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: [data],
                        datasets: [{
                            label: 'data',
                            data: [],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }]
                        }
                    }
                });




                    // myChart.data.datasets[0].data = JSON.stringify(data.data);
                    // console.log(data);
                    // myChart.update();
                });
                // myChart.update();
                    // console.log(data);
                    // var dt = data;
                    // console.log(dt);
                    // var ar = [];
                    // var dt = ar.push(data);
                    // myChart.data.datasets[0].data = data;
                    // chart.update();
                    // myChart.data.labels = JSON.stringify(data);
                    // console.log(dt);
                    // let message = document.getElementById('message');
                    // message.__x.$data.showMessage = true;
                    // message.__x.$data.message = data;

                // window.Echo.channel('my-channel')
                // .listen('my-event', (e) => {
                //     let message = document.getElementById('message');
                //     message.__x.$data.showMessage = true;
                //     message.__x.$data.message = e.message;
                // });  
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
</body>