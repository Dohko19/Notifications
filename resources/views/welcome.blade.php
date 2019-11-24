@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                @foreach (App\Post::latest()->get() as $post)
                <div class="card-header"><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></div>
                @endforeach
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection