<?php

namespace App\Events;

use App\Category;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Log;

class DataEvent
{

    use Dispatchable, InteractsWithSockets, SerializesModels;

/**

 * Create a new event instance.

 *

 * @return void

 */

    public function __construct()
    {

//

    }

/**

 * Get the channels the event should broadcast on.

 *

 * @return \Illuminate\Broadcasting\Channel|array

 */

    public function broadcastOn()
    {

        return new PrivateChannel('channel-name');

    }

    public function categoryCreated(Category $category)
    {

        Log::info("Category Created: " . $category);

    }

    public function categoryUpdated(Category $category)
    {

        Log::info("Category Updated: " . $category);

    }

    public function categoryDeleted(Category $category)
    {

        Log::info("Category Deleted: " . $category);

    }

}
