@extends('personal.layouts.sidebarHead')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Liked posts</h1>
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
            <div class="card">
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Title</th>
                      <th colspan="2" class="text-center">Action</th>
                    
                    </tr>
                  </thead>
                  <tbody>

                   @foreach ($posts as $post)
                    <tr>
                      <td>{{$post->id}}</td>
                      <td>{{$post->title}}</td>
                      <td><a href="{{route('admin.post.show', $post->id )}}"><i class="far fa-eye"></i></a></td>
                      <td>
                       <form action="{{route('personal.liked.delete', $post->id)}}" method="POST">
                        @csrf
                        @method('delete')
                          <button class="btn bg-transparent border-0">
                            <i class="fas fa-trash" style="color:red"></i>
                          </button>
                       </form>
                      </td>
                    </tr>
                   @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
  </div>
  <!-- /.content-wrapper -->
 @endsection