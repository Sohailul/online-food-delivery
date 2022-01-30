@extends('admin.master')

@section('title') 
    Edit Ticket
@endsection

@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
<!-- Modal -->
<div class="card m-auto" style="width: 28rem;">
    <div class="card-header bg-primary"><h3>Edit Orders</h3></div>
        <div class="card-body">
        <form action="{{ route('all_ticket.update', $ticket->id) }}" method="POST">
           {{ csrf_field() }}
           {{method_field('PATCH')}}
            <div class="form-group">   
                <label class="form-label">Customer Id</label>
                <input type="text" class="form-control" name="customer_id" value="{{ $ticket->customer_id }}" readonly>
            </div>
            <div class="form-group">   
                <label class="form-label">Subject</label>
                <input type="text" class="form-control" name="subject" value="{{ $ticket->subject }}" required>
            </div>
            <div class="form-group">   
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" required>{{ $ticket->description }}</textarea>
            </div>
            <div class="form-group">   
            <label class="form-label">Type</label>
                <select class="form-control" name="type">   
                <option value="support" {{ $ticket->type == 'support' ? 'selected' : '' }}>Support</option>
                    <option value="payment" {{ $ticket->type == 'payment' ? 'selected' : '' }}>Payment</option>
                    <option value="complaint" {{ $ticket->type == 'complaint' ? 'selected' : '' }}>Complaint</option>
                    <option value="others" {{ $ticket->type == 'others' ? 'selected' : '' }}>Others</option>
                </select>
            </div>
            <div class="form-group">
            <label class="form-label">Status</label>
                <select class="form-control" name="status">
                    <option value="opened" {{$ticket->status == 'opened' ? 'selected' : ''}}>Opened</option>
                    <option value="answered" {{$ticket->status == 'answered' ? 'selected' : ''}}>Answered</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary float-sm-right">Update</button>
        </form>
        </div>
    </div>
</div>
    </section>
  </div>

@endsection