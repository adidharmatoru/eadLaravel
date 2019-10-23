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
                                <img src="{{ asset('storage/'.$post->image) }}" class="rounded-circle w-100" style="max-width: 40px;">
                            </div>
                            <div>
                                <div class="font-weight-bold">
                                    <a href="/profile/{{ $post->id }}">
                                        <span class="text-dark">{{ $post->name }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <a href="/post/{{ $post->id }}">
                            <img src="/storage/{{ $post->image }}" class="w-100">
                        </a>
                    </div>
                    <div class="card-footer">
                        <div>
                    <b>{{$post->email}}</b></div>
                        {{ $post->caption }}
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
