<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Inertia\Inertia;

class TicketPageController extends Controller
{
    public function index()
    {
        $tickets = Ticket::where(
            'user_id',
            auth()->id()
        )
            ->latest()
            ->get();

        return Inertia::render('Tickets/Index', ['tickets'=>$tickets]);
    }
}
