@extends('admin.master')

@section('title') 
    Paused Order
@endsection

@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    

    <div class="container">
        <div class="row">
        @foreach($orders as $order)
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <p class="card-text">Order Date: {{ $order->created_at }}</p>
                        <p class="card-text">Customer Name: {{ $order->customers->name }}</p>
                        <p class="card-text">Address: {{ $order->address }}</p>
                        <p class="card-text">Item Name: {{ $order->item_name }}</p>
                        <p class="card-text">Payment Type: {{ $order->methods }}</p>
                        <p class="card-text">Status: {{ $order->status }}</p>
                        <p class="card-text">Total Bill: {{ $order->total }}</p>
                        <a href="{{route('order.edit',$order->id)}}" class="btn btn-primary">Update</a> 
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
    </section>
  </div>

@endsection