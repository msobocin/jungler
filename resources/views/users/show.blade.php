@extends('app')

@section('content')
<div class="row row-em">
    <div class="col-sm-6 col-sm-offset-4  user-details">

        <div class="user-image">
            <img width="100" height="100" src="{{ asset('img/dede.jpg') }}" alt="{{ $user->name}}" title="{{ $user->name}}" class="img-circle">
        </div>
        <div class="user-info-block ">
            <div class="user-heading">
                <h2>{{ $user->name }}</h2>
            </div>
            <ul class="navigation">
                <li class="active">
                    <a data-toggle="tab" href="#information">
                        <span class="glyphicon glyphicon-user"></span>
                    </a>
                </li>
                <li>
                    <a data-toggle="tab" href="#settings">
                        <span class="glyphicon glyphicon-cog"></span>
                    </a>
                </li>
                <li>
                    <a data-toggle="tab" href="#email">
                        <span class="glyphicon glyphicon-envelope"></span>
                    </a>
                </li>
                <li>
                    <a data-toggle="tab" href="#events">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </a>
                </li> 

            </ul>
            <div class="user-body">
                <div class="tab-content">

                    <!-- Informacion Usuario-->

                    <div id="information" class="tab-pane active">
                        <h4>Account Information</h4>
                        <div class="table">
                            <table class="table table-condensed">
                                <tr>
                                    <td>Nombre</td><td>{{ $user->name}}</td>
                                </tr>
                                <tr>
                                    <td>Email</td><td>{{ $user->email}}</td>
                                </tr>
                            </table>
                        </div>


                    </div>
                    <!-- -->

                    <!--Formulario Setting-->
                    <div id="settings" class="tab-pane">
                        <h4>Settings</h4>
                        {!! Form::model($user, ['method' => 'PATCH', 'route' => ['users.update', $user->slug]]) !!}
                            <div class="form-group">


                                {!! Form::label('password', 'Contraseña:') !!}
                                {!! Form::text('password') !!}
                            </div>
                            {!! Form::submit("Modificar") !!}


                        {!! Form::close() !!}
                        <!-- -->




                    </div>
                    <div id="email" class="tab-pane">
                        <h4>Send Message</h4>
                    </div>
                    <div id="events" class="tab-pane">
                        <h4>Events</h4>
                    </div>
                </div>
            </div>



        </div>


        @foreach( $posts->reverse() as $post )
        <!--        <li><a href="{{ route('posts.show', $post->slug) }}">{{ $post->content }} </a> {{ $post -> created_at }} user: {{ $post->user->name }}</li>
                @if($post->comments)
                <ul>
                    @foreach( $post->comments->where("user_id",$user->id) as $comment )
                    <li><a href="{{ route('posts.show', $post->slug) }}">{{ $comment->body }} </a> {{ $comment -> created_at }} user: {{ $comment->user->name }}</li>
                    @endforeach
                </ul>-->
        @endif
        @endforeach
        {{--<p>{{ var_dump($user )}}</p>--}}


        {{--@foreach( $latestActivit    ies as $activity )--}}
        {{--{!! $auxpost= (App\Post) $activity->text; !!}--}}
        {{--<li><a href="{{ route('posts.show', $post->slug) }}">{{ $activity->text }} </a> {{ $activity -> created_at }} user: {{ $activity->user->name }}</li>--}}
        {{--@endforeach--}}

    </div>
</div>
@endsection