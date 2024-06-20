@extends('admin.layouts.sidebarHead')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit posts</h1>
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
          <form action="{{route('admin.post.update', $post->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="card-body">
              <div class="form-group">
                <label for="name">Name of post</label>
                <input type="text" name="title" class="form-control" id="name" value="{{$post->title}}">
                @error('title')
                  <p>{{$message}}</p>
                @enderror
              </div>
              <div class="form-group">
                <textarea id="summernote" name="content">{{$post->content}}</textarea>
                @error('content')
                  <p>{{$message}}</p>
                @enderror
              </div>

              <div class="form-group">
                <label>Custom Select</label>
                <select class="custom-select" name="category_id">
                  @foreach ($categories as $category)
                    <option value="{{$category->id}}" {{$category->id == $post->category_id ? ' selected' : ''}}>{{$category->title}}</option>
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
                    <option {{is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? ' selected' : ''}} value="{{$tag->id}}">{{$tag->title}}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="mainImage">Main Image</label>
                <div class="w-50">
                  <img src="{{url('storage/' . $post->main_image)}}" alt="main_image" class="w-50">
                </div>
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
                <div class="w-50">
                  <img src="{{ url('storage/' . $post->single_image)}}" alt="single_image" class="w-50">
                </div>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="single_image" id="singleImage">
                    <label class="custom-file-label" for="singleImage">Choose file</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
                @error('single_image')
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