@extends('app')

@section('content')
<div class="container-fluid">
    <div class="row row-em">
        <div class="col-md-3 col-md-offset-4">
            <div class="wrap1">
                <div class="form-register">
                <p class="form-title">Login</p>
                <div class="panel-body">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            <a href="../app.blade.php"></a>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                      
                        <form class="login" role="form" method="POST" action="{{ url('/auth/login') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="text" placeholder="Usuario" name="email" value="{{ old('email') }}" />
                            <input type="password" placeholder="Contrase&ntilde;a" name="password" />
                            <input type="submit" value="Sign In" class="btn btn-success " />
                            <div class="remember-forgot">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="checkbox">
                                            <label class="textInput">
                                                <input type="checkbox" />
                                                Remember Me
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 forgot-pass-content">
                                        <a href="{{ url('/password/email') }}" class="forgot-pass">Forgot Password</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!--					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
                                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    
                                                                    <div class="form-group">
                                                                            <label class="col-md-4 control-label">E-Mail Address Michal eres un mamooon</label>
                                                                            <div class="col-md-6">
                                                                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                                                            </div>
                                                                    </div>
                    
                                                                    <div class="form-group">
                                                                            <label class="col-md-4 control-label">Password</label>
                                                                            <div class="col-md-6">
                                                                                    <input type="password" class="form-control" name="password">
                                                                            </div>
                                                                    </div>
                    
                                                                    <div class="form-group">
                                                                            <div class="col-md-6 col-md-offset-4">
                                                                                    <div class="checkbox">
                                                                                            <label>
                                                                                                    <input type="checkbox" name="remember"> Remember Me
                                                                                            </label>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                    
                                                                    <div class="form-group">
                                                                            <div class="col-md-6 col-md-offset-4">
                                                                                    <button type="submit" class="btn btn-primary">Login</button>
                    
                                                                                    <a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>
                                                                            </div>
                                                                    </div>
                                                            </form>-->
                </div>
               </div>
        </div>
    </div>
</div>
@endsection
