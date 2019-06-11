<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Historial;
class SuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     *
     * @param  login  $event
     * @return void
     */
    public function handle(login $event)
    {    
        $historial = new Historial();
        $historial->usuario_id = Auth::id();
        $historial->date_login = Carbon::now();
        $historial->direccion =$this->request->ip();
        $historial->save();


    }
}
