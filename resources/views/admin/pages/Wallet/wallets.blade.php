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
              <li><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Wallets</button></li>
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
                <th>Payment Method</th>
                <th>Action</th>
              </tr>

            </thead>
            <tbody>
              @php($i=1)
              @foreach($wallets as $wallet)
              <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $wallet->methods }}</td>
                <td><a href="{{route('wallet.edit',$wallet->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                <form id="delete-form-{{$wallet->id}}" action="{{route('wallet.destroy',$wallet->id)}}" method="post" style="display:none;">
                                                @csrf
                                                {{method_field('DELETE')}}

                                            </form>
                                            <a href="" onclick="if(confirm('Are you sure, You want to delete this?'))
                                            {
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{$wallet->id}}').submit();
                                            }else{
                                                event.preventDefault();
                                                    }" class="btn btn-danger">
                  <i class="fa fa-times"></i></a>
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
        <form action="{{ route('wallet.store') }}" method="POST">
           {{ csrf_field() }}
            <div class="form-group">   
                <label class="form-label">Payment Method</label>
                <input type="text" class="form-control" name="methods">
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