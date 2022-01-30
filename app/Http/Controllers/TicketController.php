<?php

namespace App\Http\Controllers;

use Auth;
use App\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        if(Auth::user()->roles == 'admin'){
            $tickets = Ticket::all();
            return view('admin.pages.Ticket.all_ticket', compact('tickets'));
        }
        else{
            $tickets = Ticket::where('customer_id', $id)->get();
            return view('admin.pages.Ticket.all_ticket', compact('tickets'));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ticket = new Ticket;
        
        $ticket->customer_id = $request->customer_id;
        $ticket->subject = $request->subject;
        $ticket->description = $request->description;
        $ticket->type = $request->type;
        
        $ticket->save();

        return redirect()->route('all_ticket.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket = Ticket::find($id);
        return view('admin.pages.Ticket.edit_ticket',compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ticket = Ticket::find($id);

        $ticket->customer_id = $request->customer_id;
        $ticket->subject = $request->subject;
        $ticket->description = $request->description;
        $ticket->type = $request->type;
        $ticket->status = $request->status;
        
        $ticket->save();

        return redirect()->route('all_ticket.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ticket::where('id',$id)->delete();
        return redirect()->back();
    }
}
