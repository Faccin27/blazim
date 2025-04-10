<?php

namespace App\Listeners;

use App\Events\UserUpdateEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserUpdateListener
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
    public function handle(UserUpdateEvent $event): void
    {
        Log::channel('users')->info("Usuário " . Auth::user()->name . " ALTEROU o registro ID: " . $event->model->id . " na TABELA: " . $event->model->getTable());
    }
}
