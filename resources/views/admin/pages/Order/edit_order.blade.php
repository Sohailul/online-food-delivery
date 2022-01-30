@extends('admin.master')

@section('title') 
    Food Menu
@endsection

@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
<!-- Modal -->
<div class="card m-auto" style="width: 28rem;">
    <div class="card-header bg-primary"><h3>Edit Orders</h3></div>
        <div class="card-body">
        <form action="{{ route('order.update', $order->id) }}" method="POST">
           {{ csrf_field() }}
           {{method_field('PATCH')}}
           <div class="form-group">  
            <label class="form-label">Select Item</label> 
                <select class="form-control" name="item_name">
                    @foreach($items as $item)                  
                    <option value="{{$item->item_name}} ({{$item->price}})" {{ $item->item_name == $order->item_name ? 'selected' : '' }}>{{$item->item_name}} ({{$item->price}})</option> 
                    @endforeach                  
                </select>
                <input type="hidden" class="form-control" name="id" value="{{ $order->id }}">
            </div>
            <div class="form-group">   
                <label class="form-label">Customer Id</label>
                <input type="text" class="form-control" name="customer_id" value="{{ $order->customer_id }}">
            </div>
            <div class="form-group">   
                <label class="form-label">Address</label>
                <input type="text" class="form-control" name="address" value="{{ $order->address }}">
            </div>
            <div class="form-group">  
            <label class="form-label">Select Payment Method</label> 
                <select class="form-control" name="methods">
                    @foreach($wallets as $wallet)                  
                    <option value="{{$wallet->methods}}" {{ $wallet->methods == $order->methods ? 'selected' : '' }}>{{$wallet->methods}}</option> 
                    @endforeach                  
                </select>
            </div>

            <div class="form-group" id="bkashtrx" style="display: none;">
                <label class="form-label" for="bkash">Trx Id</label> 
                <input type="text" class="form-control" id="bkash" name="bkash_trxid" value="{{ $order->bkash_trxid }}" />
            </div>
            <div class="form-group" id="nagadtrx" style="display: none;">
                <label class="form-label" for="nagad">Trx Id</label> 
                <input type="text" class="form-control" id="nagad" name="nagad_trxid" value="{{ $order->nagad_trxid }}" />
            </div>

            <div class="form-group">   
                <label class="form-label">Quantity</label>
                <input type="number" class="form-control" name="quantity" value="{{ $order->quantity }}">
            </div>
            <div class="form-group">   
                <label class="form-label">Total</label>
                <input type="text" class="form-control" name="total" value="{{ $order->total }}">
            </div>
            <div class="form-group">   
            <label class="form-label">Status</label>
                <select class="form-control" name="status">    
                     @if(Auth::user()->roles == 'admin')      
                    <option value="Yet to be delivered">Yet to be delivered</option> 
                    <option value="Paused">Paused</option>                  
                    @endif
                    @if(Auth::user()->roles == 'customer')
                    <option value="Cancelled by Customer">Cancelled by Customer</option> 
                    @endif 
                </select>
            </div>
            <button type="submit" class="btn btn-primary float-sm-right">Update</button>
        </form>
        </div>
    </div>
</div>
    </section>
  </div>
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