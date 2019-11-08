@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($posts as $post)
        <div class="row justify-content-center">
            <div class="col-md-8 mb-5">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <div class="pr-3">
                                <img src="{{ asset('storage/'.$post->user->avatar) }}" class="rounded-circle w-100" style="max-width: 40px;">
                            </div>
                            <div>
                                <div class="font-weight-bold">
                                    <a href="/profile/{{ $post->user_id }}">
                                        <span class="text-dark">{{ $post->user->name }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <a href="/post/{{ $post->id }}">
                            <img src="{{ 'storage/'.$post->image }}" class="w-100">
                        </a>
                    </div>
                    <div class="card-footer">
                        <form action="{{route('likes.update', $post->id)}}" method="post">
                            @csrf
                            <button class="btn" name="direct" value="home" type="submit"><i class="fa fa-heart-o"></i></button>
                            <a href="/post/{{ $post->id }}"><i class="fa fa-comment-o"></i></a>
                        </form>
                        <p><b>{{$post->likes}} Likes</b></p>
                        <b>{{$post->user->email}} </b>{{ $post->caption }}

                        @foreach($comment as $comments)
                        <div>
                                <a href="/profile/{{ $comments->user->id }}">
                                    <b><span class="text-dark">{{ $comments->user->email }}</span></b>
                                </a>
                                <span>
                                    {{ $comments->comment }}
                                </span>
                        </div>
                        @endforeach
                        <br>
                        <form action="{{route('comment.add',$post->id)}}" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="comment" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" name="direct" value="home" type="submit">Post</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
</div>
@endsection
