<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Rite-Away Pharmacy | Medical Supply</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{!! url('public/css/bootstrap.css') !!}">
        <link rel="stylesheet" type="text/css" href="{!! url('public/css/all.css') !!}">
        <link rel="stylesheet" type="text/css" href="{!! url('public/css/style.css') !!}">
    </head>
    <body>

        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-5 d-none d-xl-block px-0">
                    <div class="login-left-section">
                        <img src="{!! asset('public/img/logo.png') !!}">
                    </div>
                </div>
                <div class="col-xl-7 col-lg-12 px-0">
                    <div class="login-right-section d-flex flex-column align-items-center justify-content-center">
                        <div class="d-lg-block d-xl-none text-center mb-5"><img src="{!! asset('public/img/logo.png') !!}" class="login-right-logo"></div>
                        <div class="login-box">
                            <div class="login-heading text-center">Sign In To</div>
                            <div class="login-sub-heading text-center">Rite-Away Pharmacy <br/>&amp; Medical Supply</div>

                            <form class="mt-4" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-white"><i class="fas fa-envelope"></i></div>
                                        </div>
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Username"/>

                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-white"><i class="fas fa-unlock-alt"></i></div>
                                        </div>
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password" />

                                        @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group form-check">
                                    <div class="float-left">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                               <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                    <div class="float-right">
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <button type="submit" class="btn w-100 signin-btn">
                                    {{ __('Login') }}<i class="fas fa-paper-plane ml-2"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="{!! asset('public/js/jquery.min.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('public/js/popper.min.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('public/js/bootstrap.min.js') !!}"></script>
    </body>
</html>