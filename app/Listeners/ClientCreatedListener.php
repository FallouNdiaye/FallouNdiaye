<?php

namespace App\Listeners;


use App\Events\ClientCreatedEven;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ClientCreatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public $client;
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  ClientCreatedEven  $event
     * @return void
     */
    public function handle(ClientCreatedEven $event)
    {
        //
        dd($event->client->name.'vient etre creee');
    }
}
