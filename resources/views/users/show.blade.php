@extends('app')

@section('content')
<div class="container">
    <div class="row row-em">

        <div class="col-md-8">
            @if (!Auth::guest())

            {!! Form::model(new App\Post, ['route' => ['posts.store'], 'class'=>'']) !!}

            @include('posts/partials/_form_tag_user', ['submit_text' => 'Crear'])
            {!! Form::close() !!}

            @endif

         

            @foreach( $posts->reverse() as $post )
            <div class="media comentario">


                <div class="media-left">
                    <a class="pull-left" href=''>
                        <img class="img-circle" src="{{ asset('img/dede.jpg') }}" width="45">
                    </a>
                </div>
                <div class="media-body">

                    <h4 class="media-heading"> {{ $post->user->name }}  
                        {{ $post -> created_at }} </h4>





                    <!--                                @if(!$post->count())
                                                    @else <span class="badge coments hidden-xs">{{$post->comments->count()}}</span>
                                                    @endif -->






<!--                    <h4 class="media-heading">{{ $post->user->name }} <small >{{ $post -> created_at }}</small>
                        @if(!$post->count())
                        @else <span class="badge coments hidden-xs">{{$post->comments->count()}}</span>
                        @endif 

                        
                    </h4>-->
                    <div class="row">
                        <div class="col-md-12 ">
                            <p class="texto-p">  {{ $post->content }}</p>
                            <p></p>
                        </div>
                    </div>

                    <div class="responder">

                        @if (!Auth::guest())

                        {!! Form::open(array('class' => 'form-inline', 'method' => 'POST', 'route' => array('posts.like', $post->slug))) !!}
                        <div class="form-group" >

                            {!! Form::submit("Like", ['class'=>'btn btn-link', 'src'=>'img/dede.jpg)']) !!}
                            <label>{{ $post->likeCount }}</label>
                        </div>
                        {!! Form::close() !!}
                        <hr/>
                        @endif
                        @if (!Auth::guest())<a  href="#{{$post->id}}" data-toggle="collapse"  aria-expanded="false" aria-controls="collapseExample" data-placement="bottom" title="Responder"><span class="glyphicon glyphicon-pencil"></span></a> @endif &nbsp; &nbsp;&nbsp; &nbsp;
                        <a href="{{ route('posts.show', $post->slug) }}" data-toggle="tooltip" data-placement="bottom" title="Ver post"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> </a>
                        &nbsp; &nbsp;&nbsp; &nbsp;


                        @if ($post->comments->count()>0)
                        <a class="" data-toggle="collapse" href="#{{$post->slug}}" aria-expanded="false" aria-controls="collapseExample" data-placement="bottom" title="Ver comentarios"><div class="glyphicon glyphicon-chevron-down">   </div> 
                        </a>  
                        <span class="badge count-coment hidden-xs">{{$post->comments->count()}}</span>

                        @endif

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

                <!--<br />-->
                <!--<li><a href="{{ route('posts.show', $post->slug) }}">{{ $post->content }} </a> {{ $post -> created_at }} user: {{ $post->user->name }}</li>-->
            </div>
            @endforeach
            <!--        @foreach( $posts->reverse() as $post )
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
                    {{--@endforeach--}}-->
        </div>
        <div class="col-md-4 col-xs-12 col-sm-12">
            <div class="row">
                <div class="col-md-9 col-md-offset-3">
                    <div class="thumbnail">
                        <img src="{{ asset('img/dede.jpg') }}" alt="{{ $user->name }}" width="200" height="300" class="img-thumbnail">
                        <div class="caption">
                            <table class="table table-hover">
                                <tr><td><span class="glyphicon glyphicon-user" aria-hidden="true"></span></td><td> {{ $user->name }}</td></tr>
                                <tr><td><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></td><td> {{ $user->email }}</td></tr>
                                <tr><td><span class=" glyphicon glyphicon-time" aria-hidden="true"></span></td><td>{{ $user->created_at }}</td></tr>
                                <tr><td><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></td><td>{{$user->posts()->count()}} </td></tr>
                            </table>
                            @if(!Auth::guest())
                                @if (Auth::user()->id == $user->id)    
                                    <p><button type="button" class="btn btn-success" data-toggle="modal" data-target="#{{$user->id}} " data-whatever="@mdo">Editar</button></p>
                                @endif                           
                            @endif
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" >Editar Perfil</h4>
                            </div>
                            <div class="modal-body">


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary">Modificar</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>

@endsection