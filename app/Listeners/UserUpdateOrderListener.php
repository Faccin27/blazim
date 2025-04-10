<?php

namespace App\Listeners;

use App\Events\UserUpdateEvent;
use App\Events\UserUpdateOrderEvent;
use App\Models\Site;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class UserUpdateOrderListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserUpdateOrderEvent $event): void
    {
        Log::channel('users')->info("Usuário " . Auth::user()->name . " ORDENOU os registros da TABELA: " . $event->model->getTable());
    }
}
