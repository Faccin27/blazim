<?php

namespace App\Listeners;

use App\Events\UserDestroyEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserDestroyListener
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
    public function handle(UserDestroyEvent $event): void
    {
        Log::channel('users')->info("Usuário " . Auth::user()->name . " DESTRUIU o registro ID: " . $event->model->id . " na TABELA: ". $event->model->getTable());
    }
}
