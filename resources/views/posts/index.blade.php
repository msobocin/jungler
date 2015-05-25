@extends('app') 

@section('content')
<div class="container">
    <div class="row row-em">    
        <div class="col-md-8 col-xs-12 col-sm-12">

            <!--        <h2>Posts</h2>-->
            <div class="row">


                @if (!Auth::guest())

                {!! Form::model(new App\Post, ['route' => ['posts.store'], 'class'=>'']) !!}

                @include('posts/partials/_form', ['submit_text' => 'Create Post'])
                {!! Form::close() !!}

                @endif


                @if ( !$posts->count() )
                You have no post
                @else
            </div>

            <div class="media comentario">

                @foreach( $posts->reverse() as $post )
                <a class="pull-left" href=''>
                    <img class="img-circle" src="{{ asset('img/dede.jpg') }}" width="45">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{ $post->user->name }} <small >{{ $post -> created_at }}</small>
                        @if(!$post->count())
                        @else <span class="badge coments hidden-xs">{{$post->comments->count()}}</span>
                        @endif 


                    </h4>
                    <p>  {{ $post->content }}</p>
                    <div class="responder">
                        <a  href="#{{$post->slug}}" data-toggle="collapse"  aria-expanded="false" aria-controls="collapseExample" data-placement="bottom" title="Responder"><span class="glyphicon glyphicon-pencil"></span></a> &nbsp; &nbsp;
                        <a href="{{ route('posts.show', $post->slug) }}" data-toggle="tooltip" data-placement="bottom" title="Ver post"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> </a>
                        &nbsp; &nbsp;


                        @if ($post->comments->count()>0)
                        <a class="" data-toggle="collapse" href="#{{$post->slug}}" aria-expanded="false" aria-controls="collapseExample" data-placement="bottom" title="Ver comentarios"><div class="glyphicon glyphicon-collapse-down">   </div> 
                        </a>   
                        @endif

                        <p>Likes: {{ $post->likeCount }}</p>

                        @if (!Auth::guest())

                            {!! Form::open(array('class' => 'form-inline', 'method' => 'POST', 'route' => array('posts.like', $post->slug))) !!}

                                {!! Form::submit("Like", ['class'=>'btn btn-success']) !!}

                            {!! Form::close() !!}

                        @endif


                        <div class="collapse" id="{{$post->slug}}">
                            <div class="well">
                                @if ($post->comments->count()>0)


                                    @foreach( $post->comments as $comment )

                                        <a class="pull-left" href=''>   <img class="img-circle" src="{{ asset('img/dede.jpg') }}" width="45"></a>
                                        <div class="media-body ">
                                            <h4 class="media-heading">
                                                {{ $comment->user->name }}<small >{{ $comment -> created_at }}</small></h4>
                                            <p class="text-center"><p>{{ $comment->body }}</p>
                                        </div>
                                        <hr />

                                     @endforeach

                                    @if (!Auth::guest())    

                                        {!! Form::model(new Lanz\Commentable\Comment, ['route' => ['posts.comments.store', $post->slug], 'class'=>'' ,'id'=>"commet-$post->id"]) !!}
                                        @include('posts/partials/_form_comment', ['submit_text' => 'Create Comment'])
                                        {!! Form::close() !!}

                                    @endif

                                @else 
                              
                                        @if (!Auth::guest())

                                        {!! Form::model(new Lanz\Commentable\Comment, ['route' => ['posts.comments.store', $post->slug], 'class'=>'' ,'id'=>"commet-$post->id"]) !!}
                                        @include('posts/partials/_form_comment', ['submit_text' => 'Create Comment'])
                                        {!! Form::close() !!}

                                        @endif
                                @endif
                            </div>
                        </div>


                    </div>

                </div>
                <hr /> 
                <!--<br />-->
                <!--<li><a href="{{ route('posts.show', $post->slug) }}">{{ $post->content }} </a> {{ $post -> created_at }} user: {{ $post->user->name }}</li>-->
                @endforeach
            </div>

        </div>

        <div class="col-md-4 col-xs-12 col-sm-12 col-xs-12">
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
                    <div class="col-xs-6 ">
                        <ul class="list-unstyled">
                            <li><a href="#">#PASAMELABOTELLA</a>
                            </li>
                            <li><a href="#">#OMEGAELFUELTE</a>
                            </li>
                            <li><a href="#">#VAINALOCA</a>
                            </li>
                            <li><a href="#">#LOCO</a>
                            </li>

                            <li><a href="#">#Guapisimo</a>
                            </li>
                            <li><a href="#">#hashtag</a>
                            </li>
                            <li><a href="#">#Havannaclub7</a>
                            </li>
                            <li><a href="#">#WOW</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /.row -->
            </div>

            <!-- Side Widget Well -->
            <div class="well">
                <h4>Mis tags</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
            </div>
        </div>
    </div>

    @endif
    @endsection