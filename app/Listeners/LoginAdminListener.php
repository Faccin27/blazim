<?php

namespace App\Listeners;

use App\Events\LoginAdminEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;

class LoginAdminListener
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
     * @param  \App\Events\LoginAdminEvent  $event
     * @return void
     */
    public function handle(LoginAdminEvent $event)
    {
        Log::channel('users')->info("Usuário " . $event->user . " logou no sistema! IP: " . Request::ip());
    }
}
