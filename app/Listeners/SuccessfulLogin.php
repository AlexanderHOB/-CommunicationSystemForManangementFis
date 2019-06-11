<?php

namespace App\Listeners;

use App\Events\Event\login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  login  $event
     * @return void
     */
    public function handle(login $event)
    {
        //
    }
}
