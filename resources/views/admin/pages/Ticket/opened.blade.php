@extends('admin.master')

@section('title') 
    Opened Tickets
@endsection

@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    

    <div class="container">
        <div class="row">
        @foreach($tickets as $ticket)
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <p class="card-text">Ticket Date: {{ $ticket->created_at }}</p>
                        <p class="card-text">Customer Name: {{ $ticket->customers->name }}</p>
                        <p class="card-text">Subject: {{ $ticket->subject }}</p>
                        <p class="card-text">Description: {{ $ticket->description }}</p>
                        <p class="card-text">Type: {{ $ticket->type }}</p>
                        <p class="card-text">Status: {{ $ticket->status }}</p>
                        <a href="{{route('all_ticket.edit',$ticket->id)}}" class="btn btn-primary">Update</a> 
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
    </section>
  </div>

@endsection