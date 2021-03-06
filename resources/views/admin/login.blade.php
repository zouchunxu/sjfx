<!DOCTYPE html>
<!--
Beyond Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3
Version: 1.0.0
Purchase: http://wrapbootstrap.com
-->

<html xmlns="http://www.w3.org/1999/xhtml">
<!--Head-->
<head>
    <meta charset="utf-8" />
    <title>登录</title>

    <meta name="description" content="login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="/assets/img/favicon.png" type="image/x-icon">

    <!--Basic Styles-->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link id="bootstrap-rtl-link" href="" rel="stylesheet" />
    <link href="/assets/css/font-awesome.min.css" rel="stylesheet" />

    <!--Fonts-->

    <!--Beyond styles-->
    <link id="beyond-link" href="/assets/css/beyond.min.css" rel="stylesheet" />
    <link href="/assets/css/demo.min.css" rel="stylesheet" />
    <link href="/assets/css/animate.min.css" rel="stylesheet" />
    <link id="skin-link" href="" rel="stylesheet" type="text/css" />

    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <script src="/assets/js/skins.min.js"></script>
</head>
<!--Head Ends-->
<!--Body-->
<body>
<div class="login-container animated fadeInDown">
    <div class="loginbox bg-white">
        <div class="loginbox-title">SIGN IN</div>
        <div class="loginbox-social">
            <div class="social-title ">Connect with Your Social Accounts</div>
            <div class="social-buttons">
                <a href="" class="button-facebook">
                    <i class="social-icon fa fa-facebook"></i>
                </a>
                <a href="" class="button-twitter">
                    <i class="social-icon fa fa-twitter"></i>
                </a>
                <a href="" class="button-google">
                    <i class="social-icon fa fa-google-plus"></i>
                </a>
            </div>
        </div>
        <div class="loginbox-or">
            <div class="or-line"></div>
            <div class="or">Login</div>
        </div>
        <form action="/admin-login" method="post">
            {{ csrf_field() }}
            <div class="loginbox-textbox">
                <input type="text" class="form-control" placeholder="账号"  name="username" />
            </div>
            <div class="loginbox-textbox">
                <input type="password" class="form-control" placeholder="密码" name="password" />
            </div>
            {{--<div class="loginbox-forgot">--}}
            {{--<a href="">Forgot Password?</a>--}}
            {{--</div>--}}
            <div class="loginbox-submit">
                <input type="submit" class="btn btn-primary btn-block" value="登录">
            </div>

        </form>


    </div>
    <div class="logobox">
    </div>
</div>

<!--Basic Scripts-->
<script src="/assets/js/jquery-2.0.3.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>

<!--Beyond Scripts-->
<script src="/assets/js/beyond.js"></script>

<!--Google Analytics::Demo Only-->
<!--Body Ends-->
</html>
