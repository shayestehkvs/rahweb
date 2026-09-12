<?php

namespace App\Services;

use App\Models\Ticket;


class TicketService
{


    public function create(array $data)
    {

        return Ticket::create($data);

    }


    public function changeStatus(
        Ticket $ticket,
        string $status
    )
    {

        $ticket->update([
            'status'=>$status
        ]);


        return $ticket;

    }


}
