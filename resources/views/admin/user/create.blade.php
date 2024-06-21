@extends('admin.layouts.sidebarHead')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.user.index')}}">Users</a></li>
              <li class="breadcrumb-item active">Create users</li>
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
          <form action="{{route('admin.user.store')}}" method="POST">
            @csrf

            <div class="card-body">

              <div class="form-group">
                <label for="name">Name of user</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Name user">
                @error('name')
                  <p>{{$message}}</p>
                @enderror
              </div>

              <div class="form-group">
                <label for="name">Email of user</label>
                <input type="text" name="email" class="form-control" id="name" placeholder="Email of user">
                @error('email')
                  <p>{{$message}}</p>
                @enderror
              </div>
              
              {{-- <div class="form-group">
                <label for="name">Password of user</label>
                <input type="text" name="password" class="form-control" id="name" placeholder="Password of user">
                @error('password')
                  <p>{{$message}}</p>
                @enderror
              </div> --}}

              <div class="form-group">
                <label>Select role</label>
                <select class="custom-select" name="role">
                  @foreach ($roles as $id => $role)
                    <option value="{{$id}}" {{$id == old('role_id') ? ' selected' : ''}}>{{$role}}</option>
                  @endforeach
                  @error('role')
                    <p>{{$message}}</p>
                  @enderror
                </select>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btb-block btn-success w-100" value="Create user">
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