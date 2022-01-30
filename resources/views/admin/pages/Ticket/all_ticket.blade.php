@extends('admin.master')

@section('title') 
    Food Menu
@endsection

@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tickets</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            @if(Auth::user()->roles == 'customer')
              <li><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Open Tickets</button></li>
            @endif
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-body">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>SL.</th>
                <th>Customer Name</th>
                <th>Subject</th>
                <th>Description</th>
                <th>Type</th>
                <th>Status</th>
                <th>Action</th>
              </tr>

            </thead>
            <tbody>
              @php($i=1)
              @foreach($tickets as $ticket)
              <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $ticket->customers->name }}</td>
                <td>{{ $ticket->subject }}</td>
                <td>{{ $ticket->description }}</td>
                <td><span class="badge badge-secondary">{{ $ticket->type }}</span></td>
                <td><span class="badge badge-secondary">{{ $ticket->status }}</span></td>
                
                <td>
                @if(Auth::user()->roles == 'admin')
                  <a href="{{ route('all_ticket.edit', $ticket->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                @endif 
                <form id="delete-form-{{$ticket->id}}" action="{{route('all_ticket.destroy',$ticket->id)}}" method="post" style="display:none;">
                                                @csrf
                                                {{method_field('DELETE')}}

                                            </form>
                                            <a href="" onclick="if(confirm('Are you sure, You want to delete this?'))
                                            {
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{$ticket->id}}').submit();
                                            }else{
                                                event.preventDefault();
                                                    }" class="btn btn-danger">
                  <i class="fa fa-times"></i></a>
                  <a href="https://m.me/binaryeshop" target="_blank" class="btn btn-info"><i class="fab fa-facebook-messenger"></i></a>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
<!-- Modal -->
<div class="modal fade" id="exampleModal"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <form action="{{route('all_ticket.store')}}" method="POST">
           {{ csrf_field() }}
            <div class="form-group">   
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="customer_id" value="{{ Auth::user()->id }}">
            </div>
            <div class="form-group">
            </div>
            <div class="form-group">
                <label class="form-label">Subject</label>
                <input type="text" class="form-control" name="subject">
            </div>
            <div class="form-group">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description"></textarea>
            </div>
            <div class="form-group">
                <select class="form-control" name="type">
                    <option value="support">Support</option>
                    <option value="payment">Payment</option>
                    <option value="complaint">Complaint</option>
                    <option value="others">Others</option>
                </select>
            </div>
            @if(Auth::user()->roles == 'admin')
            <div class="form-group">
                <select class="form-control" name="status">
                    <option value="opened">Opened</option>
                    <option value="answered">Answered</option>
                </select>
            </div>
            @endif
            <button type="submit" class="btn btn-primary float-sm-right">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>

    </section>
</div>

@endsection