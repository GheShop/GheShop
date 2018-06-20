<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.css')}}" type="text/css">
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}" type="text/css">
</head>
<body>
<div class="row" id="loginTop">
    <h1 id="title">
        <span id="logo">Admin <span>UI</span></span>
    </h1>
</div>
<div class="row" id="loginCenter">
    <div id="loginMain">
        <div id="frmTitle">LOG IN</div>
        <div class="form">
            <form action="{{url('login')}}" method="POST">
                @csrf
                <div class="row">
                    <label for="email">email</label>
                    <input required type="text" id="email" name="email" value="{{old('email')}}"/>
                    @if($errors->has('email'))
                        <p style="color:red;font-size: 0.8em">{{$errors->first('email')}}</p>
                    @endif
                </div>
                <div class="row">
                    <label for="password">password</label>
                    <input required type="password" id="password" name="password"/>
                    @if($errors->has('password'))
                        <p style="color:red;font-size: 0.8em">{{$errors->first('password')}}</p>
                    @endif
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-danger">SIGN IN</button>
                </div>
                <div class="row">
                    <a href="#" class="btn btn-link">Forgot your password?</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
<script type="text/javascript" src="{{URL::asset('js/jquery.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/login.js')}}"></script>
</html>