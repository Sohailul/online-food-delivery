@extends('admin.master')

@section('title') 
    Food Menu
@endsection

@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="card m-auto" style="width: 30rem;">
    <div class="card-header bg-primary"><h3>Edit Wallet</h3></div>
        <div class="card-body">
              <form action="{{ route('wallet.update', $wallet->id) }}" method="POST">
                @csrf 
                {{method_field('PATCH')}}
              <div class="form-group">    
                <input type="text" class="form-control" name="methods" value="{{ $wallet->methods }}">
                <input type="hidden" class="form-control" name="id" value="{{ $wallet->id }}"> 
              </div>
              
              <button type="submit" class="btn btn-primary float-sm-right">Update</button>
            </form>
        </div>
    </div>
    </section>
    <!-- /.content -->
  </div>

@endsection