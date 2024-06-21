@extends('personal.layouts.sidebarHead')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Comments</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Home</li>

            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12">
            <form action="{{route('personal.comment.update', $comment->id)}}" method="POST">
              @csrf
              @method('PATCH')
              <div class="card-body">
                <div class="form-group">
                  <textarea class="form-control" name="message" id="" cols="30" rows="10">{{$comment->message}}</textarea>
                  @error('message')
                    <p>{{$message}}</p>
                  @enderror
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btb-block btn-success w-100" value="Edit comment">
                </div>
              </div>
            </form>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
  </div>
  <!-- /.content-wrapper -->
 @endsection