@extends('admin.layouts.sidebarHead')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.user.index')}}">Users</a></li>
              <li class="breadcrumb-item active">{{$user->name}}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
         <div class="col-md-6">
          <form action="{{route('admin.user.update', $user->id)}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="card-body">

              <div class="form-group">
                <label for="name">Name of user</label>
                <input type="text" name="name" class="form-control" id="name" value="{{$user->name}}">
                @error('name')
                  <p>{{$message}}</p>
                @enderror
              </div>

              <div class="form-group">
                <label for="email">Email of user</label>
                <input type="email" name="email" class="form-control" id="email" value="{{$user->email}}">
                @error('email')
                  <p>{{$message}}</p>
                @enderror
              </div>

              <div class="form-group">
                <label>Select role</label>
                <select class="custom-select" name="role">
                  @foreach ($roles as $id => $role)
                    <option value="{{$id}}" {{$id == $user->role ? ' selected' : ''}}>{{$role}}</option>
                  @endforeach
                  @error('role')
                    <p>{{$message}}</p>
                  @enderror
                </select>
              </div>
              
              <div class="form-group">
              <input type="hidden" name="user_id" value="{{$user->id}}">
              </div>

              <div class="form-group">
                <input type="submit" class="btn btb-block btn-success w-100" value="Edit user">
              </div>
            </div>
          </form>
         </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 @endsection