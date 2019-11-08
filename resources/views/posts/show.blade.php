@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="{{ asset('storage/'.$post->image) }}" class="w-100">
        </div>
        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img src="{{ asset('storage/'.$user->avatar) }}" class="rounded-circle w-100" style="max-width: 40px;">
                    </div>
                    <div>
                        <div class="font-weight-bold">
                            <a href="/profile/{{ $user->id }}">
                                <span class="text-dark">{{ $user->name }}</span>
                            </a>
                        </div>
                    </div>
                </div>

                <hr>

                <p>
                    <div>
                        <a href="/profile/{{ $user->id }}">
                            <b><span class="text-dark">{{ $user->email }}</span></b>
                        </a>
                    <span>{{ $post->caption }}</span>
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
                    </div>
                </p>
            </div>
            <hr>
            <form action="{{route('likes.update', $post->id)}}" method="post">
                @csrf
                <button class="btn" name="direct" type="submit"><i class="fa fa-heart-o"></i></button>
                <a href="/post/{{ $post->id }}"><i class="fa fa-comment-o"></i></a>
            </form>
            <p><b>{{$post->likes}} Likes</b></p>
            <form action="{{route('comment.add',$post->id)}}" method="post">
                @csrf
                <input class="form-control" type="text" name="comment" id="" placeholder="Add a comment..">
            </form>
        </div>
    </div>
</div>
@endsection
