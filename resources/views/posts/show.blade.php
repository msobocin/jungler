@extends('app')

@section('content')
<div class="container">
    <div class="row row-em">
        <div class="col-lg-8">
            <div class="panel panel-success">
                <div class="panel-heading">
                <a class="pull-left" href=''>   <img class="img-circle" src="{{ asset('img/dede.jpg') }}" width="45"></a>
                <h4>{{ $post->user->name }}</h4>
                </div>
                <div class="panel-body">
                     
                    <!--<h4 class="media-heading"> {{ $post->user->name }} </h4>-->
                    {{ $post->content }}
                      </div>
            </div>
            
            @if ($post->comments->count()>0)
                        @foreach( $post->comments as $comment )
                         <div class="media comentario comentusuario">
                        <a class="pull-left" href=''>   <img class="img-circle" src="{{ asset('img/dede.jpg') }}" width="45"></a>
                        <div class="media-body">
                            <h4 class="media-heading">
                                {{ $comment->user->name }}<small >{{ $comment -> created_at }}</small></h4>
                            <p class="text-center">  {{ $comment->body }}</p>
                        </div>
                    </div>
           
            
                    <!--<li><a href="{{ route('posts.show', $post->slug) }}">{{ $comment->body }} </a> {{ $comment -> created_at }} user: {{ $comment->user->name }}</li>-->
                    @endforeach
                    <!--</ul>-->
                    
            @endif
       
        </div>
        <div class="col-lg-4 hidden-xs ">
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
                <h4>Tags más populares</h4>
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
                        </ul>
                    </div>
                    <div class="col-xs-6 ">

                        <ul class="list-unstyled">
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

</div>

@endsection