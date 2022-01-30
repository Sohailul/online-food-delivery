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
            <h1>My Account</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <table class="table">
            <tbody>
              <tr>
                <th scope="row">Name</th>
                <td>{{ Auth::user()->name }}</td>
                <td rowspan="4" align="center"><img src="https://st.depositphotos.com/2101611/3925/v/600/depositphotos_39258143-stock-illustration-businessman-avatar-profile-picture.jpg" width="250" height="250"></td>
              </tr>
              <tr>
                <th scope="row">Role</th>
                <td>{{ Auth::user()->roles }}</td>
              </tr>
              <tr>
                <th scope="row">Email</th>
                <td>{{ Auth::user()->email }}</td>
              </tr>
              <tr>
                <th scope="row">Phone</th>
                <td>{{ Auth::user()->phone }}</td>
              </tr>
              <tr>
                <th scope="row">Address</th>
                <td>{{ Auth::user()->address }}</td>
                <td rowspan="2" align="center">
                  <a href="" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-edit"></i>&nbsp;Update</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
              <form action="{{ route('account.update', Auth::user()->id) }}" method="POST">
                @csrf
                {{method_field('PATCH')}}
              <div class="form-group">    
                <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" placeholder="Name">
                <input type="hidden" class="form-control" name="id" value="{{ Auth::user()->id }}"> 
              </div>
              <div class="form-group">   
                <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" placeholder="Email" readonly>
              </div>
              <div class="form-group">   
                <input type="text" class="form-control" name="roles" value="{{ Auth::user()->roles }}" placeholder="Roles" readonly>
              </div>
              <!-- <div class="form-group">   
                <input type="password" class="form-control" name="password" value="{{ Auth::user()->password }}" placeholder="Password">
              </div> -->
              <div class="form-group">   
                <input type="text" class="form-control" name="phone" value="{{ Auth::user()->phone }}" placeholder="Phone">
              </div>
              <div class="form-group">    
                <input type="text" class="form-control" name="address" value="{{ Auth::user()->address }}" placeholder="Address">
              </div>
              
              <button type="submit" class="btn btn-primary float-sm-right">Update</button>
            </form>
            </div>
          </div>
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div> 
@endsection