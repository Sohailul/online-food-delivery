@extends('admin.master')

@section('title') 
    All Users
@endsection

@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users Table</h1>
          </div>
          <div class="col-sm-6">
            
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
                <th>Email</th>
                <th>Address</th>
                <th>Roles</th>
                <th>Phone</th>
                <th>Action</th>
              </tr>

            </thead>
            <tbody>
              @php($i=1)
              @foreach($users as $user)
              <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->roles }}</td>
                <td>{{ $user->phone }}</td>
                <td><a href="{{ route('user.edit',$user->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                <form id="delete-form-{{$user->id}}" action="{{route('user.destroy',$user->id)}}" method="post" style="display:none;">
                                                @csrf
                                                {{method_field('DELETE')}}

                                            </form>
                                            <a href="" onclick="if(confirm('Are you sure, You want to delete this?'))
                                            {
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{$user->id}}').submit();
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

    </section>
  </div>

@endsection