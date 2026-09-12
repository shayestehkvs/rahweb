<?php

namespace App\Listeners;

use App\Events\TicketStatusChanged;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class LogTicketStatusChange
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
    public function handle(TicketStatusChanged $event)
    {
        Log::info(
            'Ticket status changed',
            [
                'ticket'=>$event->ticket->id,
                'from'=>$event->oldStatus,
                'to'=>$event->newStatus
            ]
        );

    }
}
