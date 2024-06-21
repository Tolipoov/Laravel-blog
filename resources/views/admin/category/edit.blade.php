@extends('admin.layouts.sidebarHead')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Categories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.category.index')}}">Categories</a></li>
              <li class="breadcrumb-item active">{{$category->title}}</li>
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
          <form action="{{route('admin.category.update', $category->id)}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="card-body">
              <div class="form-group">
                <label for="name">Name of category</label>
                <input type="text" name="title" class="form-control" id="name" value="{{$category->title}}" placeholder="Name category">
                @error('title')
                  <p>{{$message}}</p>
                @enderror
              </div>
              <div class="form-group">
                <input type="submit" class="btn btb-block btn-success w-100" value="Edit category">
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