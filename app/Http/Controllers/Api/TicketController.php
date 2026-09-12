<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;


class TicketController extends Controller
{

    public function index()
    {
        return Ticket::with('user')->latest()->get();
    }


    public function store(Request $request)
    {

        $data = $request->validate([
            'title'=>'required',
            'description'=>'required',
            'attachment'=>'required|file|mimes:pdf,jpg,jpeg,png'
        ]);


        $path = $request
            ->file('attachment')
            ->store('tickets');


        $ticket = Ticket::create([

            'user_id'=>auth()->id(),

            'title'=>$data['title'],

            'description'=>$data['description'],

            'attachment'=>$path,

        ]);


        return response()->json($ticket);

    }


    public function show(Ticket $ticket)
    {
        return $ticket;
    }

}
