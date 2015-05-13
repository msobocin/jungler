@extends('app')
 
@section('content')
    <h2>Posts</h2>
 
    @if ( !$posts->count() )
        You have no post
    @else
        <ul>
            @foreach( $posts as $post )
                <li><a href="{{ route('posts.show', $post->slug) }}">{{ $post->content }} </a> {{ $post -> created_at }} user: {{ $post->user->name }}</li>
            @endforeach
        </ul>
    @endif
@endsection