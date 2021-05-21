<?php
    require __DIR__ . '/vendor/autoload.php';
    $options = array(
        'cluster' => 'mt1',
        'useTLS' => false
    );
    $pusher = new Pusher\Pusher(
        '12345',
        '12345',
        '12345',
        $options
    );
    $data['message'] = 'hello world';
    $pusher->trigger('my-channel', 'my-event', $data);
?>