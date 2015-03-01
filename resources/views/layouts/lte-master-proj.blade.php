<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $page['title'] or "BAS Projects Database" }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link href="{{ Config::get('app.url') }}css/bootstrap.min.css" rel="stylesheet">

    <link href="{{ Config::get('app.url') }}css/AdminLTE.min.css" rel="stylesheet">
    <link href="{{ Config::get('app.url') }}css/skin-blue.min.css" rel="stylesheet">

    <link href="{{ Config::get('app.url') }}css/dataTables.bootstrap.css" rel="stylesheet">

    <link href="{{ Config::get('app.url') }}css/datepicker3.css" rel="stylesheet">

    <link href="{{ Config::get('app.url') }}css/app.css" rel="stylesheet">

    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="../../https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="../../https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="skin-blue layout-top-nav">

<!-- header logo: style can be found in header.less -->
<header class="main-header">
    <!-- Logo -->

    <nav class="navbar navbar-default navbar-fixed-top navbar-static-top">
        <div class="navbar-header">
            <a href="{{ Config::get('app.url') }}" class="logo"><b>BAS</b>Projects</a>
        </div>

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
            </button>
        </div>

        @include("navigation.admin")

    </nav>
</header>

<!-- Full Width Column -->
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ $page['title'] or "BAS Projects Database" }}
                <small>{{ $page['subtitle'] or "Aggregated view of people and projects" }}</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            @yield('content')
        </section><!-- /.content -->
    </div><!-- /.container -->
</div><!-- /.content-wrapper -->

<footer class="main-footer">
    <div class="container-fluid">
        <div class="pull-right hidden-xs">
            <b>Version</b> 0.1 Alpha
        </div>
        <strong>Copyright &copy; {{  date("Y") }} <a href="http://www.antarctica.ac.uk">British Antarctic Survey</a>.</strong> All rights reserved.
    </div><!-- /.container -->
</footer>

</div><!-- ./wrapper -->

<script src='{{ Config::get('app.url') }}js/all.js'></script>

@yield('footer-script')

</body>
</html>
