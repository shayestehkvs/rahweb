<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Inertia\Inertia;
class AdminTicketPageController extends Controller
{
    public function index()
    {
        return Inertia::render(
            'Admin/Tickets/Index',
            [
                'tickets'=>Ticket::latest()->get()
            ]
        );
    }

    public function levelTwo()
    {
        return Inertia::render(
            'Admin/Tickets/Index',
            [
                'tickets'=>Ticket::where(
                    'status',
                    'level_two_review'
                )
                    ->latest()
                    ->get()
            ]
        );


    }

}
