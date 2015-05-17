@extends('app')
 
@section('content')
    <h2>{{ $user->name }}</h2>

    @foreach( $posts->reverse() as $post )
        <li><a href="{{ route('posts.show', $post->slug) }}">{{ $post->content }} </a> {{ $post -> created_at }} user: {{ $post->user->name }}</li>
        @if($post->comments)
            <ul>
            @foreach( $post->comments->where("user_id",$user->id) as $comment )
                <li><a href="{{ route('posts.show', $post->slug) }}">{{ $comment->body }} </a> {{ $comment -> created_at }} user: {{ $comment->user->name }}</li>
            @endforeach
            </ul>
        @endif
    @endforeach
    {{--<p>{{ var_dump($user )}}</p>--}}


    {{--@foreach( $latestActivit    ies as $activity )--}}
        {{--{!! $auxpost= (App\Post) $activity->text; !!}--}}
        {{--<li><a href="{{ route('posts.show', $post->slug) }}">{{ $activity->text }} </a> {{ $activity -> created_at }} user: {{ $activity->user->name }}</li>--}}
    {{--@endforeach--}}
@endsection