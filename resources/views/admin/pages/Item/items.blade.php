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
            <h1>Food Menu</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            @if(Auth::user()->roles == 'customer')
            <li><a href="{{ route('order.index') }}" class="btn btn-primary">Place Order</a></li>&nbsp;
            @endif
            @if(Auth::user()->roles == 'admin')
              <li><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Items</button></li>
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
                <th>Name</th>
                <th>Item Price</th>
                <th>Status</th>
                @if(Auth::user()->roles == 'admin')
                <th>Action</th>
                @endif
              </tr>

            </thead>
            <tbody>
              @php($i=1)
              @foreach($items as $item)
              <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $item->item_name }}</td>
                <td>{{ $item->price }}</td>
                <td>Available</td>
                @if(Auth::user()->roles == 'admin')
                <td><a href="{{ route('item.edit', $item->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                <form id="delete-form-{{$item->id}}" action="{{route('item.destroy',$item->id)}}" method="post" style="display:none;">
                                                @csrf
                                                {{method_field('DELETE')}}

                                            </form>
                                            <a href="" onclick="if(confirm('Are you sure, You want to delete this?'))
                                            {
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{$item->id}}').submit();
                                            }else{
                                                event.preventDefault();
                                                    }" class="btn btn-danger">
                  <i class="fa fa-times"></i></a>
                </td>
                @endif
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
        <form action="{{route('item.store')}}" method="POST">
           {{ csrf_field() }}
            <div class="form-group">   
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="item_name">
            </div>
            <div class="form-group">
            </div>
                <div class="form-group">
                <label class="form-label">Price</label>
                <input type="text" class="form-control" name="price">
            </div>
            <button type="submit" class="btn btn-primary float-sm-right">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>

    </section>
  </div>

@endsection