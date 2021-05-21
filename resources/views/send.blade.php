
<!DOCTYPE html>
<html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real-Time Chart 2</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pusher/7.0.3/pusher.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
<div class="container pt-5">
    <form action="/send" method="POST">
        <input type="text" name="content">
        <input type="submit">
        {{ csrf_field() }}
    </form>
</div>