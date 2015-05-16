@extends('app')
 
@section('content')
    <h2>{{ $user->name }}</h2>


    @foreach( $user->posts as $post )
        <li><a href="{{ route('posts.show', $post->slug) }}">{{ $post->content }} </a> {{ $post -> created_at }} user: {{ $post->user->name }}</li>
    @endforeach
    <p>{{ var_dump($user )}}</p>
@endsection