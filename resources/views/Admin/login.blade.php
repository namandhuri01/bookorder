<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Login</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="all,follow">
        <link href="{{ asset('css/common.css') }}" rel="stylesheet">   
    </head>
    <body>
        <section>
            <div class="row" style="height:95vh;">
                <div class="col-sm-6 col-md-4 mx-auto my-auto" style="background-color:#fff ">
                    <div class="login-sec">
                        <h2 class="text-center">{{ __('Admin Login') }}</h2>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="EmailInput" class="text-uppercase mt-10">{{ __('Email') }}</label>

                                <input type="email" name="email" class="form-control" placeholder="Email Address" id="EmailInput" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                
                                @error('email')
                                    <label class="">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="PasswordInput" class="text-uppercase">Password</label>                                
                                <input id="PasswordInput" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <label class="">{{ $message }}</label>
                                @enderror
                            </div>          
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <small>Remember Me</small>
                                </label>
                                <button type="submit" class="btn btn-login float-right">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
        </section>
        <!-- JavaScript files-->
        <script src="{{ asset('js/common.js') }}"></script>
        <style type="text/css">
            body {
                background: #e8edf3;  /* fallback for old browsers */
                /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera */
            }
            .login-sec{padding: 50px 30px; position:relative;}
            .login-sec .copy-text{position:absolute; width:80%; bottom:20px; font-size:13px; text-align:center;}
            .login-sec .copy-text i{color:#FEB58A;}
            .login-sec .copy-text a{color:#E36262;}
            .login-sec h2{margin-bottom:30px; font-weight:800; font-size:30px; color: #2a5f87;}
            .login-sec h2:after{content:" "; width:100px; height:5px; background:#FEB58A; display:block; margin-top:20px; border-radius:3px; margin-left:auto;margin-right:auto}
            .btn-login{background: #2a5f87; color:#fff; font-weight:600;}
        </style>
    </body>
</html>