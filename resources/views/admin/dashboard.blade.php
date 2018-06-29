<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{URL::asset('images/admin/dashboardTitle.png')}}"/>
    <title>Document</title>
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.css')}}" type="text/css">
    <link rel="stylesheet" href="{{URL::asset('css/backend/dashboard.css')}}" type="text/css">
</head>
<body>
{{--<a href="{{route('admin.logout')}}">Logout</a>--}}
<div class="wrapper">
    {{--Title Bar--}}
    <div class="Title-Bar">
        <div class="col-xs-12 col-sm-2 dashboard-title"><span>Dashboard</span></div>
        <div class="col-xs-12 col-sm-10 dashboard-user-info">
            <span class="glyphicon glyphicon-align-justify " id="iconNav"></span>
            <div class="adminInfo">
                <ul class="main-item-info">
                    <li class="user-info">
                        <img src="{{URL::asset('images/admin/userIcon.jpg')}}" alt="user Icon" id="user-icon">
                        <span class="user-info-name">Le Ba Minh</span>
                    </li>
                    <li class="icon-user-setting-main">
                        <span class="glyphicon glyphicon-cog id" id="icon-user-setting"></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    {{--Navbar--}}
    <div class="hidden-xs col-sm-2 dashboard-nav">

    </div>
    {{--Content-Main--}}
    <div class="col-xs-12 col-sm-10 content-main"></div>
</div>
</body>
<script type="text/javascript" src="{{URL::asset('js/jquery.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/admin/dashboard.js')}}"></script>
</html>
