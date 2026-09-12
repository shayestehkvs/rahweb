<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Enums\TicketStatus;
use Illuminate\Http\Request;
use App\Jobs\SendTicketToWebService;
use App\Notifications\TicketStatusNotification;

class TicketApprovalController extends Controller
{
    public function index()
    {
        return Ticket::latest()->get();
    }

    public function approve(Request $request, Ticket $ticket)
    {
        $user = auth()->user();
        if($user->hasRole('admin_level_1') && $ticket->status === TicketStatus::Pending){

            $ticket->update([
                'status'=>TicketStatus::LevelTwoReview,
                'level_one_approved_at'=>now()
            ]);
        }
        elseif($user->hasRole('admin_level_2') && $ticket->status === TicketStatus::LevelTwoReview){

            $ticket->update([
                'status'=>TicketStatus::Approved,
                'level_two_approved_at'=>now()
            ]);

            SendTicketToWebService::dispatch($ticket);
            $ticket->user->notify(
                new TicketStatusNotification(
                    'Your ticket was approved'
                )
            );
        }

        return response()->json([
            'message'=>'Ticket approved',
            'ticket'=>$ticket
        ]);
    }

    public function reject(Request $request, Ticket $ticket)
    {

        $request->validate([
            'reason'=>'required|string'
        ]);

        $ticket->update([
            'status'=>TicketStatus::Rejected,
            'reject_reason'=>$request->reason
        ]);
        $ticket->user->notify(
            new TicketStatusNotification(
                'Your ticket was rejected'
            )
        );
        return response()->json([
            'message'=>'Ticket rejected'
        ]);
    }
}
