@extends('layouts.nav')

@section('content')
<main class="blog-post">
    <div class="container">
        <h1 class="edica-page-title">{{$post->title}}</h1>
        <p class="edica-blog-post-meta"><b> {{$post->created_at->format('M d, Y H:i')}} *** </b> {{ optional($post->comments)->count() ?: '0'}} Comments</p>
        <section class="blog-post-featured-img" data-aos="fade-up">
            <img src="{{asset('storage/' . $post->single_image)}}" alt="featured image" class="w-100">
        </section>
        <section class="post-content">
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <p>{!! $post->content!!}</p>
                </div>
            </div>
        </section>
        <div class="row">
            <div class="col-lg-9 mx-auto">
                <section class="related-posts">
                    <h2 class="section-title mb-4">Related Posts</h2>
                    <div class="row">
                        @foreach ($relationPosts as $relationPost)
                            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                                <img src="{{asset('storage/'. $relationPost->main_image)}}" alt="related post" class="post-thumbnail">
                                <p class="post-category">{{$relationPost->category->title}}</p>
                                <a href="{{route('blog.single', $relationPost->id)}}" class="post-title">{{$relationPost->title}}</a>
                            </div>
                        @endforeach
                    </div>
                </section>
                <section class="comment-list">
                    <h2>Comments ( {{$post->comments->count()}})</h2>
                        @foreach ($post->comments as $comment)
                        <div class="comment-text mb-3">
                            <span class="username">
                             <div>
                                <b>
                                    {{$comment->user->name}}
                                </b>
                             </div>
                              <span class="text-muted float-right">{{$comment->created_at->format('M d, Y H:i')}} </span>
                            </span><!-- /.username -->
                            {{$comment->message}}
                          </div>
                        @endforeach       
                </section>
                @auth
                <section class="comment-section">
                    <h2 class="section-title mb-5">Leave a Reply</h2>
                    <form action="{{route('post.comment.store', $post->id)}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group col-12">
                            <label for="comment" class="sr-only">Comment</label>
                            <textarea name="message" id="comment" class="form-control" placeholder="Comment" rows="10">Comment</textarea>
                            </div>
                        </div>
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        <div class="row">
                            <div class="col-12">
                                <input type="submit" value="Send Message" class="btn btn-warning">
                            </div>
                        </div>
                    </form>
                </section>
                @endauth
            </div>
        </div>
    </div>
</main>

@endsection
