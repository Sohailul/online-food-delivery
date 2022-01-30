@extends('admin.master')

@section('title') 
    Food Menu
@endsection

@section('headSection')
<link rel="stylesheet" href="{{asset('/')}}admin/plugins/datatables/dataTables.bootstrap.css">
@endsection

@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Orders</h1>
          </div>
          <div class="col-sm-6">
          @if(Auth::user()->roles == 'customer')
            <ol class="breadcrumb float-sm-right">
              <li><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Place Orders</button></li>
            </ol>
          @endif
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-body">
          <table id="example" class="table table-striped table-hover">
            <thead>
              <tr>
                <th>SL.</th>
                <th>Item Name</th>
                <th>Customer Name</th>
                <th>Address</th>
                <th>Payment Method</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Status</th>
                <th>Action</th>
              </tr>

            </thead>
            <tbody>
              @php($i=1)
              @foreach($orders as $order)
              <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $order->item_name }}</td>
                <td>{{ $order->customers->name }}</td>
                <td>{{ $order->address }}</td>
                <td>{{ $order->methods }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->total }}</td>
                <td>{{ $order->status }}</td>
                <td><a href="{{route('order.edit',$order->id)}}" class="btn text-success"><i class="fa fa-edit"></i></a>
                @if(Auth::user()->roles == 'admin')
                <form id="delete-form-{{$order->id}}" action="{{route('order.destroy',$order->id)}}" method="post" style="display:none;">
                                                @csrf
                                                {{method_field('DELETE')}}

                                            </form>
                                            <a href="" onclick="if(confirm('Are you sure, You want to delete this?'))
                                            {
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{$order->id}}').submit();
                                            }else{
                                                event.preventDefault();
                                                    }" class="btn text-danger">
                  <i class="fa fa-trash"></i></a>
                  @endif
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
        <form action="{{ route('order.store') }}" method="POST">
           {{ csrf_field() }}
           <div class="form-group">  
            <label class="form-label">Select Item</label> 
                <select class="form-control" name="item_name">
                    <option value="">Select</option> 
                    @foreach($items as $item)                  
                    <option value="{{$item->item_name}} ({{$item->price}})">{{$item->item_name}} ({{$item->price}})</option> 
                    @endforeach                  
                </select>
            </div>
            <div class="form-group">   
                <label class="form-label">Customer Id</label>
                <input type="text" class="form-control" name="customer_id" value="{{ Auth::user()->id }}">
            </div>
            <div class="form-group">   
                <label class="form-label">Address</label>
                <input type="text" class="form-control" name="address" value="{{ Auth::user()->address }}" />
            </div>
            <div class="form-group">  
            <label class="form-label">Select Payment Method</label> 
                <select class="form-control" name="methods" id="selector" onchange="payments(this);">
                    <option value="select">Select</option> 
                    @foreach($wallets as $wallet)                  
                    <option value="{{$wallet->methods}}">{{$wallet->methods}}</option> 
                    @endforeach                  
                </select>
            </div>
            <div class="form-group" id="bkashtrx" style="display: none;">
                <label class="form-label" for="bkash">Trx Id</label> 
                <input type="text" class="form-control" id="bkash" name="bkash_trxid" placeholder="Ex: 8JE4MTG40" />
            </div>
            <div class="form-group" id="nagadtrx" style="display: none;">
                <label class="form-label" for="nagad">Trx Id</label> 
                <input type="text" class="form-control" id="nagad" name="nagad_trxid" placeholder="Ex: 5KE4MTG30" />
            </div>

            <div class="form-group">   
                <label class="form-label">Quantity</label>
                <input type="number" class="form-control" name="quantity" placeholder="Quantity" />
            </div>
            <div class="form-group">   
                <label class="form-label">Total</label>
                <input type="text" class="form-control" name="total" placeholder="Total Amount" />
            </div>
            @if(Auth::user()->roles == 'admin')
            <div class="form-group">   
            <label class="form-label">Status</label>
                <select class="form-control" name="status">          
                    <option value="Yet to be delivered" selected>Yet to be delivered</option> 
                    <option value="Paused">Paused</option> 
                    <option value="Cancelled by Customer">Cancelled by Customer</option>                   
                </select>
            </div>
            @endif
            <button type="submit" class="btn btn-primary float-sm-right">Submit Order</button>
        </form>
      </div>
    </div>
  </div>
</div>
    </section>
  </div>

@endsection
@section('footerSection')
<script src="{{asset('/admin/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script>
        $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<script>
  function payments(that) 
{
    if (that.value == "Bkash") 
    {
        document.getElementById("bkashtrx").style.display = "block";
    }
    else
    {
        document.getElementById("bkashtrx").style.display = "none";
    }
    if (that.value == "Nagad")
    {
        document.getElementById("nagadtrx").style.display = "block";
    }
    else
    {
        document.getElementById("nagadtrx").style.display = "none";
    }
}
</script>
@endsection