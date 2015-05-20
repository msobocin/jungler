@extends('app')

@section('content')
<div class="body-register">
    
    
    
<div class="container-fluid">
    <div class="row" >
        <div class="col-md-3 col-md-offset-7">
            
                <div class="wrap">
                    <div class="form-register">
                    <p class="form-title ">REGISTRATE!</p>

                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> Rellena correctamente los siguientes campos:<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form class="login" role="form" method="POST" action="{{ url('/auth/register') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <label class="textInput">Name</label>

                            <input type="text"  name="name" value="{{ old('name') }}" placeholder="Nombre" />
                            <label class="textInput">E-Mail Address</label>

                            <input type="email"  name="email" value="{{ old('email') }}"  placeholder="Correo Electronico" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$"/>

                            <label class="textInput">Password</label>

                            <input type="password"  name="password" placeholder="Contrase&ntilde;a">



                            <label class="textInput">Confirm Password</label>

                            <input type="password"  name="password_confirmation" placeholder="Confirmar Contrase&ntilde;a">




                            <input type="submit" class="btn btn-warning "  value="Registrar"/>

                        </form>

                </div>
            </div>
        </div>
    </div>
</div>

    
    
    
</div>
@endsection
