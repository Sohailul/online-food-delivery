@extends('admin.master')

@section('title') 
    Users
@endsection

@section('main-content')

    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="card m-auto" style="width: 28rem;">
            <div class="card-header bg-primary"><h3>Edit User</h3></div>
            <div class="card-body">
                <form action="{{ route('user.update', $user->id) }}" method="POST">
                    @csrf 
                    {{method_field('PATCH')}}
                <div class="form-group">    
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                    <input type="hidden" class="form-control" name="id" value="{{ $user->id }}"> 
                </div>
                <div class="form-group">   
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                </div>
                <div class="form-group">   
                    <input type="text" class="form-control" name="address" value="{{ $user->address }}">
                </div>
                <div class="form-group">   
                    <input type="text" class="form-control" name="roles" value="{{ $user->roles }}">
                </div>
                <div class="form-group">   
                    <input type="number" class="form-control" name="phone" value="{{ $user->phone }}">
                </div>
                
                <button type="submit" class="btn btn-primary float-sm-right">Update</button>
                </form>
            </div>
        </div>
    </section>
  </div>

@endsection