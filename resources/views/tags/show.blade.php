@extends('app')

@section('content')
<div class="container">
    <div class="row row-em">
        <div class="col-md-8  col-xs-12 col-sm-12 ">
            @if (!Auth::guest())

            {!! Form::model(new App\Post, ['route' => ['posts.store'], 'class'=>'']) !!}

            @include('posts/partials/_form_tag', array('tag'=>$tag,'submit_text' => 'Crear'))
            {!! Form::close() !!}

            @endif


            @if ( !$posts->count() )
            You have no post
            @else

            @foreach( $posts as $post )
            <div class="coment">
                <a class="pull-left" href=''>
                    <img class="img-circle" src="{{ asset('img/dede.jpg') }}" width="45">
                </a>
                <div class="media-body">

                    <h4 class="media-heading">{{ $post->user->name }} <small >{{ $post -> created_at }}</small>
                        @if(!$post->count())
                        @else 
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; 
                        <span class="badge   count-coment hidden-xs">Like:{{$post->likeCount}}</span>
                        @endif


                    </h4>
                    <p class="texto-p">
                        {{ $post->content }}</p>
                    <div class="responder">
                        @if (!Auth::guest())

                        {!! Form::open(array('class' => 'form-inline', 'method' => 'POST', 'route' => array('posts.like', $post->slug))) !!}
                        <div class="form-group" >

                            {!! Form::submit("Like", ['class'=>'btn btn-link', 'src'=>'img/dede.jpg)']) !!}
                            <label>{{ $post->likeCount }}</label>
                        </div>
                        {!! Form::close() !!}

                        @endif
                        <hr />

                        @if (!Auth::guest())    <a  href="#{{$post->id}}" data-toggle="collapse"  aria-expanded="false" aria-controls="collapseExample" data-placement="bottom" title="Responder"><span class="glyphicon glyphicon-pencil"></span></a> @endif &nbsp; &nbsp;&nbsp; &nbsp;
                        <a href="{{ route('posts.show', $post->slug) }}" data-toggle="tooltip" data-placement="bottom" title="Ver post"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> </a>
                        &nbsp; &nbsp;&nbsp; &nbsp;


                        @if ($post->comments->count()>0)
                        <a class="" data-toggle="collapse" href="#{{$post->slug}}" aria-expanded="false" aria-controls="collapseExample" data-placement="bottom" title="Ver comentarios"><div class="glyphicon glyphicon-chevron-down">   </div> 
                        </a>  
                        <span class="badge count-coment hidden-xs">{{$post->comments->count()}}</span>

                        @endif



    <!--                            <p>Likes: {{ $post->likeCount }}</p>

                                @if (!Auth::guest())

                                {!! Form::open(array('class' => 'form-inline', 'method' => 'POST', 'route' => array('posts.like', $post->slug))) !!}

                                {!! Form::submit("Like", ['class'=>'btn btn-success']) !!}

                                {!! Form::close() !!}

                                @endif-->

                        <div class="collapse" id="{{$post->id}}">
                            <div class="well wel">
                                @if (!Auth::guest())

                                {!! Form::model(new Lanz\Commentable\Comment, ['route' => ['posts.comments.store', $post->slug], 'class'=>'' ,'id'=>"commet-$post->id"]) !!}
                                @include('posts/partials/_form_comment', ['submit_text' => 'Create Comment'])
                                {!! Form::close() !!}

                                @endif

                            </div>
                        </div>                        


                        <div class="collapse" id="{{$post->slug}}">
                            <div class="well">
                                @if ($post->comments->count()>0)


                                @foreach( $post->comments as $comment )

                                <a class="pull-left" href=''>   <img class="img-circle" src="{{ asset('img/dede.jpg') }}" width="45"></a>
                                <div class="media-body ">
                                    <h4 class="media-heading">
                                        {{ $comment->user->name }}<small >{{ $comment -> created_at }}</small></h4>
                                    <p class="texto-p"><p>{{ $comment->body }}</p>
                                </div>


                                @endforeach


                                @endif
                            </div>
                        </div>


                    </div>


                </div>
            </div>
            <br />
            @endforeach
        </div>

    <div class="col-md-4 col-xs-12 col-sm-12">
        <!-- Buscador Jungla -->
        <div class="well">
            <h4>Explorar la jungla!</h4>
            <div class="input-group">
                <input type="text" class="form-control">
                <span class="input-group-btn">
                    <button class="btn btn-success" type="button">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
            <!-- /.input-group -->
        </div>

        <!-- Blog Categories Well -->
        <div class="well">
            <h4>Tags m&aacute;s populares</h4>
            <div class="row">
                <div class="col-xs-12 ">
                    <ul class="list-unstyled tag-list">
                        @foreach($tags as $tag)

                        <li>{!! link_to_route('tags.show', '#'.$tag->name.'('.$tag->count.')', [$tag->slug]) !!}</li>

                        @endforeach

                    </ul>
                </div>
            </div>
        </div>


        <div class="well">
            <h4>Mis tags</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
        </div>
    </div>
</div>
</div>
@endif
@endsection