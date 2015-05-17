@extends('app')
 
@section('content')
    <h2>{{ $post->content }}</h2>

    @foreach( $post->comments as $comment )
        <li><a href="{{ route('posts.show', $post->slug) }}">{{ $comment->body }} </a> {{ $comment -> created_at }} user: {{ $comment->user->name }}</li>
    @endforeach
@endsection