<?php

namespace App\Jobs;


use App\Models\Ticket;
use App\Services\FakeWebService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendTicketToWebService implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 5;

    public function __construct(public Ticket $ticket){}

    public function handle(FakeWebService $service)
    {
        try {

            $service->send([
                'id'=>$this->ticket->id,
                'title'=>$this->ticket->title,
                'description'=>$this->ticket->description
            ]);

            $this->ticket->update([
                'status'=>'sent'
            ]);

            Log::info(
                'Ticket sent successfully', ['ticket'=>$this->ticket->id]
            );

        }
        catch(\Exception $e){

            $this->ticket->update([
                'status'=>'failed'
            ]);

            Log::error(
                'Ticket sending failed', ['ticket'=>$this->ticket->id, 'error'=>$e->getMessage()]
            );

            throw $e;
        }
    }
}
