<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Pusher\Pusher;
use App\Http\Controllers\Controller;
class PusherNotificationController extends Controller
{
    public function notification() {
    $options = array(
    'cluster' => env('PUSHER_APP_CLUSTER'),
    'encrypted' => false
    );

    $pusher = new Pusher(
    env('PUSHER_APP_KEY'),
    env('PUSHER_APP_SECRET'),
    env('PUSHER_APP_ID'), 
    $options
    );
    $data['message'] = 'Hello XpertPhp';
    $pusher->trigger('notify-channel', 'App\\Events\\NewData', $data);
    }
}