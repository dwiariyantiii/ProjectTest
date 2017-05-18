@extends('admin_template')


@section('content')

<div>
      <a class="hiddenanchor" id="signup"></a>
     

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}
              <h1>Login SPPD</h1>
              <div>
                <input id="username" placeholder="Username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus />
                  @if ($errors->has('username'))
                  <span class="help-block">
                  <strong>{{ $errors->first('username') }}</strong>
                  </span>
                  @endif
              </div>
              <div>
              <input id="password" placeholder="Password" type="password" class="form-control" name="password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password'))
                <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
              <div>
               
                 <button type="submit" class="btn btn-default btn-block btn-flat">Login</button>
                
              </div>

              <div class="clearfix"></div>

              <div class="separator">
               
                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i></h1>
                  <p>©2017 All Rights Reserved</p>
                </div>
              </div>
            </form>
          </section>
        </div>

      
      </div>
    </div>
@endsection
