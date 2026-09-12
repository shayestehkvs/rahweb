<?php

namespace App\Console\Commands;


use Illuminate\Console\Command;
use App\Models\Ticket;
use App\Jobs\SendTicketToWebService;
use App\Enums\TicketStatus;



class RetryFailedTickets extends Command
{
    protected $signature = 'tickets:retry-failed';
    protected $description = 'Retry failed ticket sending';

    public function handle()
    {
        $tickets = Ticket::where('status', TicketStatus::Failed)->get();

        foreach($tickets as $ticket)
        {
            SendTicketToWebService::dispatch($ticket);
            $this->info("Ticket {$ticket->id} queued");
        }
    }
}
