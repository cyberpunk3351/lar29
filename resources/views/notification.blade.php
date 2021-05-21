<!DOCTYPE html>

<head>
    <title>Laravel 8 Pusher Notification Example Tutorial - XpertPhp</title>
    <h1>Laravel 8 Pusher Notification Example Tutorial</h1>
    <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
    <script>
        Pusher.logToConsole = true;

        var pusher = new Pusher('12345', {
            cluster: 'mt1',
            forceTLS: false
        });
    </script>
</head>