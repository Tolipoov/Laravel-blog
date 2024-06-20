@extends('admin.layouts.sidebarHead')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Posts</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
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
         <div class="col-md-10">
          <form action="{{route('admin.post.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="name">Name of post</label>
                <input type="text" name="title" class="form-control" id="name" placeholder="Name post">
                @error('title')
                  <p>{{$message}}</p>
                @enderror
              </div>
              <div class="form-group">
                <textarea id="summernote" name="content"></textarea>
                @error('content')
                  <p>{{$message}}</p>
                @enderror
              </div>

              <div class="form-group">
                <label>Select category</label>
                <select class="custom-select" name="category_id">
                  @foreach ($categories as $category)
                  <option value="{{$category->id}}" {{$category->id == old('category_id') ? ' selected' : ''}}>{{$category->title}}</option>
                  @endforeach
                  @error('category_id')
                    <p>{{$message}}</p>
                  @enderror
                </select>
              </div>

              <div class="form-group" data-select2-id="29">
                <label>Tags</label>
                <select class="select2 select2-hidden-accessible" name="tag_ids[]" multiple="" data-placeholder="Select a tags" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                  @foreach ($tags as $tag)
                    <option {{is_array(old('tag_ids')) && in_array($tag->id, old('taf_ids')) ? ' selected' : ''}} value="{{$tag->id}}">{{$tag->title}}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="mainImage">Main Image</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="main_image" id="mainImage">
                    <label class="custom-file-label" for="mainImage">Choose file</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
                  @error('main_image')
                   <p>{{$message}}</p>
                  @enderror
              </div>

              <div class="form-group">
                <label for="singleImage">Single Image</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="single_image" id="singleImage">
                    <label class="custom-file-label" for="singleImage">Choose file</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
                @error('simgle_image')
                  <p>{{$message}}</p>
                @enderror
              </div>
              
              <div class="form-group">
                <input type="submit" class="btn btb-block btn-success w-100" value="Create post">
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