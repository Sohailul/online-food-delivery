@extends('admin.master')

@section('title') 
    Food Menu
@endsection

@section('main-content')

    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="card m-auto" style="width: 28rem;">
            <div class="card-header bg-primary"><h3>Edit Items</h3></div>
            <div class="card-body">
                <form action="{{ route('item.update', $item->id) }}" method="POST">
                    @csrf 
                    {{method_field('PATCH')}}
                <div class="form-group">    
                    <input type="text" class="form-control" name="item_name" value="{{ $item->item_name }}">
                    <input type="hidden" class="form-control" name="id" value="{{ $item->id }}"> 
                </div>
                <div class="form-group">   
                    <input type="text" class="form-control" name="price" value="{{ $item->price }}">
                </div>
                
                <button type="submit" class="btn btn-primary float-sm-right">Update</button>
                </form>
            </div>
        </div>
    </section>
  </div>

@endsection