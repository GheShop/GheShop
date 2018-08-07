<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{URL::asset('images/admin/lockTitle.png')}}"/>
    <title>Login Admin</title>
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.css')}}" type="text/css">
    <link rel="stylesheet" href="{{URL::asset('css/backend/login.css')}}" type="text/css">
    <link rel="stylesheet" href="{{URL::asset('css/fontAsomeone.css')}}" type="text/css">
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
            <form action="{{route('admin.post.login')}}" method="POST">
                @csrf
                <div class="row">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username"/>
                    @if($errors->has('username'))
                        <p style="color:red;font-size: 0.8em;margin: 3px auto">{{$errors->first('username')}}</p>
                    @endif
                </div>
                <div class="row">
                    <label for="password">password</label>
                    <input type="password" id="password" name="password"/>
                    @if($errors->has('password'))
                        <p style="color:red;font-size: 0.8em;margin: 3px auto">{{$errors->first('password')}}</p>
                    @endif
                </div>
                <div class="row" style="padding-top: 10px">
                    <div class="remember" style="margin: 0 auto;position:relative;width: 60%;text-align: left">
                        <input type="checkbox" name="rememberLogin" id="rememberLogin"
                               style="width: 12px;height: 12px;position: absolute;top: 0;left: 0;cursor: pointer"/><span
                            style="display: inline-block; padding-left: 20px">Remember</span>
                    </div>
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-danger">SIGN IN</button>
                </div>
                <div class="row">
                    <a href="" class="btn btn-link" data-toggle="modal" data-target="#myModal" id="reset-password-link">Forgot your password?</a>
                </div>
            </form>
            @if($errors->has('errorLogin'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{$errors->first('errorLogin')}}
                </div>
            @endif
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #685852">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" style="color: #ffffff">Reset Password</h4>
                </div>
                <div class="modal-body">
                    <form action="#" method="POST" role="form">
                        @csrf
                        <label for="email_reset" style="font-weight: normal;margin-right: 5px" class="modal_info_1">Email</label>
                        <input type="email"  name="email_reset" id="email_reset" style="padding: 5px 10px; width: 250px;outline: none" class="modal_info_1">
                        <div class="error modal_info_1" style="color: red;text-align: center;font-size: 0.8em;margin-top: 2px" ></div>
                        <div class="inform hidden modal_info_2" style="color: green;text-align: center;margin-top: 2px;">Vui lòng truy cập vào gmail của bạn để lấy mật khẩu mới!</div>
                        <hr/>
                        <button type="button" class="btn btn-primary modal_info_1" id="sendResetPassword" style="margin: 0 auto; display: block; outline: none">
                            <i class="fa fa-spinner fa-spin" style="margin-right: 0px;opacity: 0;width: 0;height: 0;" id="loader" ></i>Send Email
                        </button>
                        <button type="button" class="btn btn-primary hidden modal_info_2 closeModal" data-dismiss="modal" aria-hidden="true" style="margin: 0 auto; display:block;outline: none">Close</button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
</body>
<script type="text/javascript" src="{{URL::asset('js/jquery.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/admin/login.js')}}"></script>
</html>
