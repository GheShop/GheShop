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
<div class="wrapper">
    {{--Title Bar--}}
    <div class="Title-Bar">
        <div class="col-xs-12 col-sm-2 dashboard-title" id="dashboard-title"><span>DashBoard</span></div>
        <div class="col-xs-12 col-sm-10 dashboard-user-info" id="dashboard-user-info">
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
    <div class="edit-user-info">
        <ul>
            <li><a href=""><span class="glyphicon glyphicon-user"></span>User Info</a></li>
            <li><a href=""><span class="glyphicon glyphicon-pencil"></span>Change Password</a></li>
            <li><a href="{{route('admin.logout')}}"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
        </ul>
    </div>
    <div class="containerMain">
        {{--Navbar--}}
        <div class="col-xs-6 col-sm-2 dashboard-nav" id="dashboard-nav">
            {{--user panel--}}
            <div class="nav-user-panel">
                <div class="pull-left-image">
                    <img src="{{URL::asset('images/admin/userIcon.jpg')}}" alt="">
                </div>
                <div class="pull-left-info">
                    <span>Le Ba Minh</span><br/>
                    <span class="glyphicon glyphicon-ok-circle"></span>
                    <span>Online</span>
                </div>
            </div>
            {{--input search--}}
            <div class="nav-search">
                <input type="text" placeholder="Search..." class="nav-input-search"/>
                <span class="nav-input-search-icon glyphicon glyphicon-search"></span>
            </div>
            <div id="nav-main-title">Main Navigation</div>
            {{--menu items--}}
            <div class="nav-menu1-items">
                <ul class="nav-menu" id="nav-menu">
                    <li><a href="#" class="active"><span class="glyphicon glyphicon-apple"></span><span>DashBoard</span></a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-bed"></span><span>Users</span></a>
                        <ul>
                            <li><a href="#">Add</a></li>
                            <li><a href="#">Edit</a></li>
                            <li><a href="#">Delete</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><span class="glyphicon glyphicon-bitcoin"></span><span>Categories</span></a>
                        <ul>
                            <li><a href="#">Add</a></li>
                            <li><a href="#">Edit</a></li>
                            <li><a href="#">Delete</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><span class="glyphicon glyphicon-camera"></span><span>Products</span></a>
                        <ul>
                            <li><a href="#">Add</a></li>
                            <li><a href="#">Edit</a></li>
                            <li><a href="#">Delete</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><span class="glyphicon glyphicon-calendar"></span><span>About</span></a>
                        <ul>
                            <li><a href="#">Add</a></li>
                            <li><a href="#">Edit</a></li>
                            <li><a href="#">Delete</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        {{--Content-Main--}}
        <div class="col-xs-6 col-sm-10 content-main" id="dashboard-content"></div>
    </div>
</div>
</body>
<script type="text/javascript" src="{{URL::asset('js/jquery.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/admin/dashboard.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/jquery.easing.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/rotate.min.js')}}"></script>
</html>
