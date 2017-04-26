<!DOCTYPE html>
<!--
BeyondAdmin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.2.0
Version: 1.0.0
Purchase: http://wrapbootstrap.com
-->

<html xmlns="http://www.w3.org/1999/xhtml">
<!-- Head -->
<head>
    <meta charset="utf-8" />
    <title>三级分销后台管理</title>

    <meta name="description" content="Dashboard" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="/assets/img/favicon.png" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--Basic Styles-->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link id="bootstrap-rtl-link" href="" rel="stylesheet" />
    <link href="/assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/assets/css/weather-icons.min.css" rel="stylesheet" />

    <!--Fonts-->
    {{--<link href="http://fonts.useso.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300" rel="stylesheet" type="text/css">--}}

    <!--Beyond styles-->
    <link id="beyond-link" href="/assets/css/beyond.min.css" rel="stylesheet" type="text/css" />
    <link href="http://sjfx.com/assets/css/beyond.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/demo.min.css" rel="stylesheet" />
    <link href="/assets/css/typicons.min.css" rel="stylesheet" />
    <link href="/assets/css/animate.min.css" rel="stylesheet" />
    <link id="skin-link" href="" rel="stylesheet" type="text/css" />
    @yield('css')
    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <script src="/assets/js/skins.min.js"></script>
</head>
<!-- /Head -->
<!-- Body -->
<body>
    <!-- Loading Container -->
    <div class="loading-container">
        <div class="loading-progress">
            <div class="rotator">
                <div class="rotator">
                    <div class="rotator colored">
                        <div class="rotator">
                            <div class="rotator colored">
                                <div class="rotator colored"></div>
                                <div class="rotator"></div>
                            </div>
                            <div class="rotator colored"></div>
                        </div>
                        <div class="rotator"></div>
                    </div>
                    <div class="rotator"></div>
                </div>
                <div class="rotator"></div>
            </div>
            <div class="rotator"></div>
        </div>
    </div>
    <!--  /Loading Container -->
    <!-- Navbar -->
    <div class="navbar">
        <div class="navbar-inner">
            <div class="navbar-container">
                <!-- Navbar Barnd -->
                <div class="navbar-header pull-left">
                    <a href="#" class="navbar-brand">
                        <small>
                            <img src="/assets/img/logo.png" alt="" />
                        </small>
                    </a>
                </div>
                <!-- /Navbar Barnd -->

                <!-- Sidebar Collapse -->
                <div class="sidebar-collapse" id="sidebar-collapse">
                    <i class="collapse-icon fa fa-bars"></i>
                </div>
                <!-- /Sidebar Collapse -->
                <!-- Account Area and Settings --->
                <div class="navbar-header pull-right">
                    <div class="navbar-account">
                        <ul class="account-area">

                            <li>
                                <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                    <div class="avatar" title="View your public profile">
                                        <img src="/assets/img/avatars/adam-jansen.jpg">
                                    </div>
                                    <section>
                                        <h2><span class="profile"><span>David Stevenson</span></span></h2>
                                    </section>
                                </a>
                                <!--Login Area Dropdown-->
                                <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                    <li class="username"><a>admin</a></li>
                                    <li class="email"><a>admin@qq.com</a></li>
                                    <!--Avatar Area-->
                                    <li>
                                        <div class="avatar-area">
                                            <img src="/assets/img/avatars/adam-jansen.jpg" class="avatar">
                                            <span class="caption">Change Photo</span>
                                        </div>
                                    </li>
                                    <!--Avatar Area-->
                                    <li class="edit">
                                        <a href="profile.html" class="pull-left">Profile</a>
                                        <a href="#" class="pull-right">Setting</a>
                                    </li>
                                    <!--Theme Selector Area-->
                                    <li class="theme-area">
                                        <ul class="colorpicker" id="skin-changer">
                                            <li><a class="colorpick-btn" href="#" style="background-color:#5DB2FF;" rel="/assets/css/skins/blue.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#2dc3e8;" rel="/assets/css/skins/azure.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#03B3B2;" rel="/assets/css/skins/teal.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#53a93f;" rel="/assets/css/skins/green.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#FF8F32;" rel="/assets/css/skins/orange.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#cc324b;" rel="/assets/css/skins/pink.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#AC193D;" rel="/assets/css/skins/darkred.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#8C0095;" rel="/assets/css/skins/purple.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#0072C6;" rel="/assets/css/skins/darkblue.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#585858;" rel="/assets/css/skins/gray.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#474544;" rel="/assets/css/skins/black.min.css"></a></li>
                                            <li><a class="colorpick-btn" href="#" style="background-color:#001940;" rel="/assets/css/skins/deepblue.min.css"></a></li>
                                        </ul>
                                    </li>
                                    <!--/Theme Selector Area-->
                                    <li class="dropdown-footer">
                                        <a href="login.html">
                                            Sign out
                                        </a>
                                    </li>
                                </ul>
                                <!--/Login Area Dropdown-->
                            </li>
                            <!-- /Account Area -->
                            <!--Note: notice that setting div must start right after account area list.
                            no space must be between these elements-->
                            <!-- Settings -->
                        </ul><div class="setting">
                            <a id="btn-setting" title="Setting" href="#">
                                <i class="icon glyphicon glyphicon-cog"></i>
                            </a>
                        </div><div class="setting-container">
                            <label>
                                <input type="checkbox" id="checkbox_fixednavbar">
                                <span class="text">Fixed Navbar</span>
                            </label>
                            <label>
                                <input type="checkbox" id="checkbox_fixedsidebar">
                                <span class="text">Fixed SideBar</span>
                            </label>
                            <label>
                                <input type="checkbox" id="checkbox_fixedbreadcrumbs">
                                <span class="text">Fixed BreadCrumbs</span>
                            </label>
                            <label>
                                <input type="checkbox" id="checkbox_fixedheader">
                                <span class="text">Fixed Header</span>
                            </label>
                        </div>
                        <!-- Settings -->
                    </div>
                </div>
                <!-- /Account Area and Settings -->
            </div>
        </div>
    </div>
    <!-- /Navbar -->
    <!-- Main Container -->
    <div class="main-container container-fluid">
        <!-- Page Container -->
        <div class="page-container">
            <!-- Page Sidebar -->
            <div class="page-sidebar" id="sidebar">
                <!-- Page Sidebar Header-->
                <div class="sidebar-header-wrapper">
                    <input type="text" class="searchinput" />
                    <i class="searchicon fa fa-search"></i>
                    <div class="searchhelper">Search Reports, Charts, Emails or Notifications</div>
                </div>
                <!-- /Page Sidebar Header -->
                <!-- Sidebar Menu -->
                <ul class="nav sidebar-menu">
                    <!--Dashboard-->
                    <li class="">
                        <a href="javascript:;">
                            <i class="menu-icon glyphicon glyphicon-home"></i>
                            <span class="menu-text"> 后台主页 </span>
                        </a>
                    </li>
                    <!--UI Elements-->
                    <li>
                        <a href="javascript:;" class="menu-dropdown">
                            <i class="menu-icon fa fa-users"></i>
                            <span class="menu-text"> 会员管理 </span>
                            <i class="menu-expand"></i>
                        </a>

                        <ul class="submenu">
                            <li>
                                <a href="/useradd">
                                    <span class="menu-text">添加会员</span>
                                </a>
                            </li>
                            <li>
                                <a href="/userlist">
                                    <span class="menu-text">会员列表</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu-dropdown">
                            <i class="menu-icon fa  fa-list"></i>
                            <span class="menu-text"> 分类管理 </span>
                            <i class="menu-expand"></i>
                        </a>

                        <ul class="submenu">
                            <li>
                                <a href="{{ route("admin::category.add") }}">
                                    <span class="menu-text">添加分类</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route("admin::category.index") }}">
                                    <span class="menu-text">分类列表</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu-dropdown">
                            <i class="menu-icon fa   fa-dot-circle-o"></i>
                            <span class="menu-text"> 商品管理 </span>
                            <i class="menu-expand"></i>
                        </a>

                        <ul class="submenu">
                            <li>
                                <a href="{{ route("admin::ware.add") }}">
                                    <span class="menu-text">添加商品</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route("admin::ware.index") }}">
                                    <span class="menu-text">商品列表</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu-dropdown">
                            <i class="menu-icon fa  fa-dollar"></i>
                            <span class="menu-text"> 提现管理 </span>
                            <i class="menu-expand"></i>
                        </a>

                        <ul class="submenu">

                        </ul>
                    </li>

                </ul>
                <!-- /Sidebar Menu -->
            </div>
            <!-- /Page Sidebar -->
            <!-- Page Content -->
            <div class="page-content">
                <!-- Page Breadcrumb -->
                <div class="page-breadcrumbs">
                    <ul class="breadcrumb">
                        <li id="title">
                        </li>
                        <li class="active" id="twotitle"></li>
                    </ul>
                </div>
                <!-- /Page Breadcrumb -->
                <!-- Page Header -->
                <div class="page-header position-relative">
                    <div class="header-title">
                        <h1 id="twotitle_s">
                        </h1>
                    </div>
                    <!--Header Buttons-->
                    <div class="header-buttons">
                        <a class="sidebar-toggler" href="#">
                            <i class="fa fa-arrows-h"></i>
                        </a>
                        <a class="refresh" id="refresh-toggler" href="">
                            <i class="glyphicon glyphicon-refresh"></i>
                        </a>
                        <a class="fullscreen" id="fullscreen-toggler" href="#">
                            <i class="glyphicon glyphicon-fullscreen"></i>
                        </a>
                    </div>
                    <!--Header Buttons End-->
                </div>
                <!-- /Page Header -->
                <!-- Page Body  <div class="page-body"> -->
                <div class="page-body">
                   @yield('main')
                </div>
                <!-- /Page Body -->
            </div>
            <!-- /Page Content -->
        </div>
        <!-- /Page Container -->
        <!-- Main Container -->

    </div>

    <!--Basic Scripts-->
    <script src="/assets/js/jquery-2.0.3.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>

    <!--Beyond Scripts-->
    <script src="/assets/js/beyond.min.js"></script>


    <!--Page Related Scripts-->
    <!--Sparkline Charts Needed Scripts-->
    <script src="/assets/js/charts/sparkline/jquery.sparkline.js"></script>
    <script src="/assets/js/charts/sparkline/sparkline-init.js"></script>

    <!--Easy Pie Charts Needed Scripts-->
    <script src="/assets/js/charts/easypiechart/jquery.easypiechart.js"></script>
    <script src="/assets/js/charts/easypiechart/easypiechart-init.js"></script>

    <!--Flot Charts Needed Scripts-->
    <script src="/assets/js/charts/flot/jquery.flot.js"></script>
    <script src="/assets/js/charts/flot/jquery.flot.resize.js"></script>
    <script src="/assets/js/charts/flot/jquery.flot.pie.js"></script>
    <script src="/assets/js/charts/flot/jquery.flot.tooltip.js"></script>
    <script src="/assets/js/charts/flot/jquery.flot.orderBars.js"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var AdminIndexUrl = '{{ $url }}';
        var title = '{{ $title or '' }}';
        var twotitle = '{{ $twotitle or '' }}';
        $('.nav li a').each(function(){
            if(typeof $(this).attr('href') == 'string' && AdminIndexUrl.match($(this).attr('href'))){
                $(this).parent().addClass('active');
                $(this).parent().parents('li').addClass('open');
                title = title ? title : $(this).parent().parents('li').children(0).html();
                twotitle = twotitle ? twotitle : $(this).parent().children(0).html();
            }
        });
        $('#title').html(title);
        $("#twotitle").html(twotitle);
        $("#title").children(0).remove('.menu-expand');
    </script>
    <script src="/assets/js/layer/layer.js"></script>
    @yield('js')
</body>
<!--  /Body -->
</html>
