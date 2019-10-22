@extends('auth.authlayout')

@section('content')

    <p class="login-box-msg"><b>Ingresar a mi cuenta</b></p>

    @if (Session::has('warning'))
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            <ul class="list-unstyled">
              <li>{{ Session::get('warning') }}</li>
            </ul>
        </div>
    @endif

    <form role="form" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
            <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

            @if ($errors->has('email'))
                    <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                    </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Contraseña">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @if ($errors->has('password'))
                    <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                    </span>
            @endif
        </div>



        <div class="row" style="margin-top:30px;margin-bottom:20px;">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox" name="remember" > {{ trans('Recordar Contraseña') }}
                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <button type="submit" class="btn btn-info btn-block ">{{ trans('Ingresar') }}</button>
            </div>
            <!-- /.col -->
        </div>


    </form>

    <div class="row">
        <div class="col-xs-6">
            <a href="{{ url('/register') }}">Registrarme</a>
        </div><!-- /.col -->
        <div class="col-xs-6">
            <a href="{{ url('/password/reset') }}" class="text-right pull-right">Recuperar contraseña</a>
        </div><!-- /.col -->
    </div>

@endsection
